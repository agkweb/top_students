<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index(): View|Factory|Application
    {
        $students = Student::orderBy('year', 'desc')->orderBy('rank')->with('courses')->get()->groupBy('year');
        return view('home.top_students.index', compact('students'));
    }

    public function result(Student $student): Factory|View|Application|RedirectResponse
    {
        if ($student->result != null){
            return view('home.top_students.result', compact('student'));
        }else{
            return redirect()->back();
        }
    }
}
