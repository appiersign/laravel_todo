<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        return view('students.index', [
            'students' => Student::all()
        ]);
    }

    public function create()
    {
        return view('students.createOrEdit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
        ]);

        $student = Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'age' => $request->input('age'),
            'birthday' => $request->input('birthday'),
            'gender' => $request->input('gender')
        ]);

        session()->flash('success', "$student->first_name added!");

        return redirect()->route('students.index');
    }
}
