<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class ReportController extends Controller
{


    public function index()
    {
        // Obtener las calificaciones del usuario autenticado
        $studentGrades = Grade::where('student_id', auth()->user()->id)->get();

        return view('reports.index', compact('studentGrades'));
    }
}
