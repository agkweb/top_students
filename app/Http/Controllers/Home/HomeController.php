<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View|Factory|Application
    {
        $students = Student::orderBy('year', 'desc')->orderBy('rank')->with('courses')->get();
        return view('index', compact('students'));
    }
}
