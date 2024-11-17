<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentMajor;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{

    public function filterMajor(): Factory|View|Application
    {
        $major = request()->major;
        if (request()->has('major') && trim($major) != ''){
            $students = Student::where('major_id', '=', $major)->orderBy('year', 'desc')->orderBy('rank')->with('courses', 'major')->get()->groupBy('year');
        }else{
            $students = Student::orderBy('year', 'desc')->orderBy('rank')->with('courses', 'major')->get()->groupBy('year');
        }
        $majors = StudentMajor::all();
        return view('home.top_students.index' , compact('students', 'majors'));
    }

    public function index(): View|Factory|Application
    {
        $students = Student::where('major_id', '=', '1')->orderBy('year', 'desc')->orderBy('rank')->with('courses', 'major')->get()->groupBy('year');
        $majors = StudentMajor::all();
        return view('home.top_students.index', compact('students', 'majors'));
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
