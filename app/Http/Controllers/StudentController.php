<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentsCreateRequest;
use App\Http\Requests\StudentsUpdateRequest;
use App\Models\Student;
use App\Models\Group;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // СТУДЕНТЫ
    public function index(){

        $students = Student::all();
        return view('students.create', compact('students'));
    }

    public function store(StudentsCreateRequest $request){
        Student::create($request->validated());
        return redirect()->route('student.create')
            ->with('success', 'Student created successfully.');

    }
    public function edit(Student $student){
        return view('students.edit', compact('student'));
    }
    public function update(StudentsUpdateRequest $request, Student $student){
        $student->update($request->validated());
        return redirect()->route('student.create')->with('success', 'Студент успешно обновлен');
    }
    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('student.create')->with('success', 'Студент успешно удален');
    }
}
