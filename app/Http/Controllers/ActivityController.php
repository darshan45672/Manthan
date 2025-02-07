<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\ProgramExpectedOutcomes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $cacheDuration = 60;

        if ($user->role == 'student') {
            $client_college_id = $user->student->college_id;
            $client_department_id = $user->student->department_id;
        }

        if ($user->role == 'faculty') {
            $client_college_id = $user->faculty->college_id;
            $client_department_id = $user->faculty->department_id;
        }

        if ($user->role == 'HoD') {
            $client_college_id = $user->hod->college_id;
            $client_department_id = $user->hod->department_id;
        }


        if ($user->role == 'Principle') {
            $client_college_id = $user->principle->college_id;

            $activities = Cache::remember("activities_college_$client_college_id", $cacheDuration, function () use ($client_college_id) {
                return Activity::with(['student', 'activityType', 'programExpectedOutcomes'])
                    ->whereHas('student', function ($query) use ($client_college_id) {
                        $query->where('college_id', $client_college_id);
                    })->get();
            });

            return view('dashboard.activity.index', compact('activities'));
        }

        $activities = Cache::remember("activities_department_$client_department_id", $cacheDuration, function () use ($client_college_id, $client_department_id) {
            return Activity::with(['student', 'activityType', 'programExpectedOutcomes'])
                ->whereHas('student', function ($query) use ($client_college_id, $client_department_id) {
                    $query->where('college_id', $client_college_id)
                        ->where('department_id', $client_department_id);
                })->get();
        });

        return view('dashboard.activity.index', compact('activities'));
    }

    public function create()
    {
        $cacheDuration = 60;

        $activityTypes = Cache::remember('activity_types', $cacheDuration, fn() => ActivityType::all());
        $peos = Cache::remember('program_expected_outcomes', $cacheDuration, fn() => ProgramExpectedOutcomes::all());

        return view('dashboard.activity.create', compact('activityTypes', 'peos'));
    }

    public function edit($id)
    {

        if (Auth::check()) {
            if (Auth::user()->role == 'student') {
                if (Auth::user()->student) {
                    $activity = Activity::with('student', 'activityType', 'programExpectedOutcomes')
                        ->where('student_id', Auth::user()->student->id)->where('id', $id)->first();
                } else {
                    dd('no data found');
                }
            } else {
                dd('not student');
            }
        } else {
            return redirect()->route('login');
        }

        $activityTypes = ActivityType::all();
        $peos = ProgramExpectedOutcomes::all();

        return view('dashboard.activity.edit', compact('activity', 'activityTypes', 'peos'));
    }

    public function update(Request $request, $id)
    {

        $activity = Activity::find($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'activity_type' => 'required|integer|exists:activity_types,id',
            'peo' => 'required|integer|exists:program_expected_outcomes,id',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'hours' => 'required|integer|min:1',
            'description' => 'required|string',
            'report' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'certificate' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        if ($request->hasFile('report')) {
            if ($activity->file) {
                Storage::disk('s3')->delete($activity->file);
            }

            $file = $request->file('report');
            $originalFileName = $file->getClientOriginalName();
            $fileName = time() . '-' . $originalFileName;

            $path = $file->storeAs('activities/report', $fileName, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $activity->file = $path;
        }

        if ($request->hasFile('certificate')) {
            if ($activity->certificate) {
                Storage::disk('s3')->delete($activity->certificate);
            }

            $file = $request->file('certificate');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('activities/certificate', $fileName, 'public');
            Storage::disk('s3')->setVisibility($path,'public');
            $activity->certificate = $path;
        }

        $activity->update([
            'title' => $request->title,
            'activity_type_id' => $request->activity_type,
            'program_expected_outcomes_id' => $request->peo,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'hours' => $request->hours,
            'description' => $request->description,
        ]);

        return redirect()->route('user.activity.index')->with('success', 'Activity updated successfully');
    }

    public function store(Request $request)
    {

        if (Auth::check()) {
            if (Auth::user()->role == 'student') {
                if (Auth::user()->student) {
                    $request->validate([
                        'title' => 'required|string|max:255',
                        'activity_type' => 'required|integer|exists:activity_types,id',
                        'peo' => 'required|integer|exists:program_expected_outcomes,id',
                        'start_date' => 'required|date|before_or_equal:end_date',
                        'end_date' => 'required|date|after_or_equal:start_date',
                        'hours' => 'required|integer|min:1',
                        'description' => 'required|string',
                        'report' => 'required|file|mimes:pdf,doc,docx|max:20480',
                        'certificate' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:20480',
                    ]);

                    $activity = new Activity();

                    if ($request->hasFile('report')) {
                        if ($activity->file) {
                            Storage::disk('s3')->delete($activity->file);
                        }

                        $file = $request->file('report');
                        $originalFileName = $file->getClientOriginalName();
                        $fileName = time() . '-' . $originalFileName;

                        $path = $file->storeAs('activities/report', $fileName, 's3');
                        Storage::disk('s3')->setVisibility($path, 'public');
                        $activity->file = $path;
                    }

                    if ($request->hasFile('certificate')) {
                        if ($activity->certificate) {
                            Storage::disk('s3')->delete($activity->certificate);
                        }

                        $file = $request->file('certificate');
                        $fileName = time() . '-' . $file->getClientOriginalName();
                        $path = $file->storeAs('activities/certificate', $fileName, 's3');
                        Storage::disk('s3')->setVisibility($path,'public');
                        $activity->certificate = $path;
                    }

                    $activity->create([
                        'student_id' => Auth::user()->student->id,
                        'title' => $request->title,
                        'activity_type_id' => $request->activity_type,
                        'program_expected_outcomes_id' => $request->peo,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'hours' => $request->hours,
                        'description' => $request->description,
                        'status' => 'pending',
                        'file' => $activity->file,
                        'certificate' => $activity->certificate,
                    ]);

                } else {
                    dd('no data found');
                }
            }
        } else {
            return redirect()->route('login');
        }
        return redirect()->route('user.activity.index')->with('success', 'Activity added successfully');
    }

    public function destroy($id)
    {
        $activity = Activity::find($id);
        if ($activity) {
            if ($activity->file) {
                Storage::disk('s3')->delete($activity->file);
            }
            if ($activity->certificate) {
                Storage::disk('s3')->delete($activity->certificate);
            }
            $activity->delete();
            return redirect()->route('user.activity.index')->with('success', 'Activity deleted successfully');
        } else {
            return redirect()->route('user.activity.index')->with('error', 'Activity not found');
        }
    }

    public function status($id, $status)
    {

        $activity = Activity::find($id);

        if (Auth::check()) {
            if (Auth::user()->role == 'faculty' && Auth::user()->faculty->is_cordinator == 1) {
                switch ($status) {
                    case 1:
                        $status = 'approved';
                        break;
                    case 2:
                        $status = 'rejected';
                        break;
                    default:
                        $status = 'pending';
                        break;
                }

                if ($activity) {
                    $activity->update([
                        'status' => $status,
                    ]);

                    return redirect()->route('user.activity.index')->with('status', 'Student status updated successfully');
                } else {
                    return redirect()->route('user.activity.index')->with('error', 'no Student activity found');
                }
            } else {
                return redirect()->route('user.activity.index')->with('error', 'You are not authorized to perform this action');
            }
        } else {
            return redirect()->route('login');
        }
    }
}