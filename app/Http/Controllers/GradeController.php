<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Application;
use App\Models\Course;


class GradeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:notas-list|notas-create|notas-edit|notas-delete', ['only' => ['index','store']]);
         $this->middleware('permission:notas-create', ['only' => ['create','store']]);
         $this->middleware('permission:notas-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:notas-delete', ['only' => ['destroy']]);
    } 
    
    public function index()
    {
        $grades = Grade::with(['student', 'course'])->get();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        $est = Application::where('accepted', 1)->get();
        $courses = Course:: all();
        return view('grades.create', compact('est', 'courses'));

    }

    public function store(Request $request)
    {
        Grade::create($request->all());
        return redirect()->route('grades.index')->with('success', 'Grade added successfully.');
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $grade->update($request->all());
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }

    public function report()
    {
        // Lógica para generar el informe de calificaciones
        // Esto es un ejemplo simple que podría ser mucho más complejo dependiendo de los requisitos específicos
        $grades = Grade::select('course_id')
                        ->groupBy('course_id')
                        ->get();

        $reports = [];
        foreach ($grades as $grade) {
            $topGrades = Grade::where('course_id', $grade->course_id)
                              ->orderBy('score', 'desc')
                              ->take(3)
                              ->get();
            $reports[$grade->course_id] = $topGrades;
        }

        return view('grades.report', compact('reports'));
    }
}
