<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Department;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(){
        if(Auth::user()->role == 'faculty'){
            $client_college_id = Auth::user()->faculty->college_id;
            $client_department_id = Auth::user()->faculty->department_id;
        }
        if(Auth::user()->role == 'HoD'){
            $client_college_id = Auth::user()->hod->college_id;
            $client_department_id = Auth::user()->hod->department_id;
        }
        if(Auth::user()->role == 'Principle'){
            $client_college_id = Auth::user()->principle->college_id;

            $students = Student::where('college_id', $client_college_id)
            ->get();

        // dd($students);
        return view('dashboard.student.index' , compact('students'));
        }
        $students = Student::where('college_id', $client_college_id)
            ->where('department_id', $client_department_id)
            ->get();

        // dd($students);
        return view('dashboard.student.index' , compact('students'));
    }

    public function create(){

        $colleges = College::all();
        $branches = Department::all();
        // $users = User::where('role', 'student')->get();
        $users = User::where('role', 'student')->whereDoesntHave('student')->get();

        return view('dashboard.student.create', compact('colleges', 'branches', 'users'));
    }

    public function store(Request $request){

        // dd($request->all());

        if(Auth::check()){
            if(Auth::user()->role == 'faculty' || Auth::user()->role == 'HoD' || Auth::user()->role == 'Principle'){
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'phone' => 'required|string|max:15',
                    'usn' => 'required|string|max:20|unique:students,usn',
                    'college' => 'required|exists:colleges,id',
                    'department' => 'required|exists:departments,id',
                    'semester' => 'required|integer|between:1,8',
                    'password' => 'required|string|min:8|confirmed',
                    'address' => 'required|string|max:500',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
        
                try {
                    // dd('inside try');
                    $user = User::create([
                        'name' => $validatedData['name'],
                        'email' => $validatedData['email'],
                        'phone' => $validatedData['phone'],
                        'password' => bcrypt($validatedData['password']),
                        'address' => $validatedData['address'],
                        'role' => 'student',
                    ]);
            
                    if ($request->hasFile('image')) {
                        $file = $request->file('image');
                        $originalFileName = $file->getClientOriginalName();
                        $fileName = time() . '-' . $originalFileName;

                        $imagePath = $file->storeAs('users', $fileName, 'public');
                        $user->update(['image' => $imagePath]);
                    }
            
                    Student::create([
                        'user_id' => $user->id,
                        'college_id' => $validatedData['college'],
                        'department_id' => $validatedData['department'],
                        'usn' => $validatedData['usn'],
                        'semester' => $request->semester,
                    ]);

                    // dd("created student");
            
                    return redirect()->route('user.students')->with('success', 'Student created successfully.');
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['error' => 'An error occurred while creating the student: ' . $e->getMessage()]);
                }
            }else{
                return redirect()->back()->with('error', 'You are not authorized to add student');
            }
        }

        // dd("saved student");

        return redirect()->route('user.students')->with('status', 'Student added successfully');

    }
}
