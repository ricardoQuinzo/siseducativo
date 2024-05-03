<?php

namespace App\Http\Controllers;


use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Application;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:mat-list|mat-create|mat-edit|mat-delete', ['only' => ['index','store']]);
         $this->middleware('permission:mat-create', ['only' => ['create','store']]);
         $this->middleware('permission:mat-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mat-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $enrollments = Enrollment::with(['course', 'student'])->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $courses = Course::all();
        $students = Application::where('accepted', 1)->get(); // Asumiendo que hay una columna de rol
        //dd($students);
        return view('enrollments.create', compact('courses', 'students'));
    }

    public function store(Request $request)
    {
        $course = Course::with('prerequisites')->find($request->course_id);
        $studentCourses = Enrollment::where('student_id', $request->student_id)->pluck('course_id')->all();

        foreach ($course->prerequisites as $prerequisite) {
            if (!in_array($prerequisite->id, $studentCourses)) {
                return back()->with('error', 'Student does not meet the course prerequisites.');
            }
        }

        Enrollment::create([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id
        ]);

        return redirect()->route('enrollments.index')->with('success', 'Student enrolled successfully.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment cancelled successfully.');
    }
}
