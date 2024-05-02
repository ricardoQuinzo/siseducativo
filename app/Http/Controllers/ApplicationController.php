<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Criterion;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $application = Application::create($request->all());
        $this->evaluateApplication($application);
        return redirect()->route('applications.index');
    }

    private function evaluateApplication(Application $application)
    {
        $criteria = Criterion::first(); // Simplificación
        $application->accepted = $application->gpa >= $criteria->minimum_gpa;
        $application->save();
    }
}
