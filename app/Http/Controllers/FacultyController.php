<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $cacheDuration = 60;

        $faculties = match ($user->role) {
            'HoD' => Cache::remember(
                "faculties_hod_{$user->faculty->college_id}_{$user->faculty->department_id}",
                $cacheDuration,
                fn() => Faculty::where([
                    'college_id' => $user->faculty->college_id,
                    'department_id' => $user->faculty->department_id,
                ])->get()
            ),
            'Principle' => Cache::remember(
                "faculties_principle_{$user->principle->college_id}",
                $cacheDuration,
                fn() => Faculty::where('college_id', $user->principle->college_id)->get()
            ),
            default => [],
        };

        return view('dashboard.faculty.index', compact('faculties'));
    }

    public function create()
    {
        $cacheDuration = 60;

        $college = Cache::remember('colleges', $cacheDuration, fn() => College::all());
        $departments = Cache::remember('departments', $cacheDuration, fn() => Department::all());
        $users = User::where('role', 'faculty')->whereDoesntHave('faculty')->get();

        return view('dashboard.faculty.create', compact('college', 'departments', 'users'));
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'HoD' || Auth::user()->role == 'Principle') {
                $request->merge([
                    'status' => $request->has('status') ? true : false,
                    'is_cordinator' => $request->has('is_cordinator') ? true : false,
                ]);

                $validated = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:8|confirmed',
                    'phone' => 'required|string',
                    'address' => 'required|string',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                    'college' => 'required|exists:colleges,id',
                    'branch' => 'required|exists:departments,id',
                    'designation' => 'required|string',
                    'qualification' => 'required|array',
                    'expierience' => 'required|string',
                    'specialization' => 'required|array',
                    'join_date' => 'required|date',
                    'leave_date' => 'nullable|date|after:join_date',
                    'status' => 'nullable|boolean',
                    'is_cordinator' => 'nullable|boolean'
                ]);

                try {
                    DB::beginTransaction();

                    $imagePath = null;
                    if ($request->hasFile('image')) {
                        $file = $request->file('image');
                        $originalFileName = $file->getClientOriginalName();
                        $fileName = time() . '-' . $originalFileName;

                        $imagePath = $file->storeAs('users', $fileName, 's3');
                        Storage::disk('s3')->setVisibility($imagePath, 'public');
                    }

                    $user = User::create([
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'password' => Hash::make($validated['password']),
                        'phone' => $validated['phone'],
                        'address' => $validated['address'],
                        'image' => $imagePath,
                        'role' => 'faculty',
                    ]);

                    $faculty = Faculty::create([
                        'user_id' => $user->id,
                        'college_id' => $validated['college'],
                        'department_id' => $validated['branch'],
                        'designation' => $validated['designation'],
                        'qualification' => $validated['qualification'],
                        'experience' => $validated['expierience'],
                        'specialization' => $validated['specialization'],
                        'joining_date' => $validated['join_date'],
                        'leaving_date' => $validated['leave_date'] ?? null,
                        'status' => $request->has('status'),
                        'is_cordinator' => $request->has('is_cordinator'),
                    ]);

                    DB::commit();

                    return redirect()->route('user.faculty')->with('success', 'Faculty member created successfully');

                } catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Failed to create faculty member');
                }
            } else {
                return redirect()->route('user.faculty')->with('error', 'You are not authorized to add faculty');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'HoD' || Auth::user()->role == 'Principle') {
                $faculty = Faculty::find($id);
                $user = $faculty->user;
                // dd($faculty);
                if ($faculty) {
                    try {
                        DB::beginTransaction();
                        // dd("going to delete")
                        $faculty->delete();
                        // dd("deleted");

                        Storage::disk('s3')->delete($user->image);
                        // dd("deleting the user");
                        $user->delete();

                        // dd("deleted the user");

                        DB::commit();

                        return redirect()->route('user.faculty')->with('success', 'Faculty member deleted successfully');
                    } catch (\Exception $e) {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Failed to delete faculty member');
                    }
                } else {
                    return redirect()->route('user.faculty')->with('error', 'Faculty member not found');
                }
            } else {
                return redirect()->route('user.faculty')->with('error', 'You are not authorized to delete faculty');
            }
        } else {
            return redirect()->route('login');
        }
    }

}
