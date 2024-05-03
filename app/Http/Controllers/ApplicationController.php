<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Criterion;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:admisiones-list|admisiones-create|admisiones-edit|admisiones-delete', ['only' => ['index','store']]);
         $this->middleware('permission:admisiones-create', ['only' => ['create','store']]);
         $this->middleware('permission:admisiones-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:admisiones-delete', ['only' => ['destroy']]);
    }
    // lista de admitidos
    public function index()
    {
        $applications = Application::all();
        return view('applications.index', compact('applications'));
    }

    // vista de admitidos
    public function create()
    {
        return view('applications.create');
    }

    // guardar
    public function store(Request $request)
    {
        $application = Application::create($request->all());
        $this->evaluateApplication($application);
        $criteria = Criterion::first();
        if ($application->gpa >= $criteria->minimum_gpa){

             // Generar una contraseña temporal
             $tempPassword = 'temporal01';
            
            // Crear el nuevo usuario
            $user = User::create([
                'name' => $application->student_name,
                'email' => $application->student_email,
                'password' => Hash::make($tempPassword) // Hashear la contraseña temporal
            ]);
            $user->assignRole('Estudiante');

        }
        return redirect()->route('applications.index');
    }

    private function evaluateApplication(Application $application)
    {
        $criteria = Criterion::first(); // Simplificación
        $application->accepted = $application->gpa >= $criteria->minimum_gpa;
        $application->save();
    }
}
