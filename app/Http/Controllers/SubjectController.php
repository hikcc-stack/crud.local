<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectsUpdateRequest; // <-- исправлено
use App\Http\Requests\SubjectsCreateRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('subjects.create', compact('subjects'));
    }

    public function store(SubjectsCreateRequest $request){
        Subject::create($request->validated());
        return redirect()->route('subject.create')
            ->with('success', 'subject created successfully.');
    }

    public function edit(Subject $subject){
        return view('subjects.edit', compact('subject'));
    }

    public function update(SubjectsUpdateRequest $request, Subject $subject){
        $subject->update($request->validated());
        return redirect()->route('subject.create')->with('success', 'Предмет успешно обновлен');
    }

    public function destroy(Subject $subject){
        $subject->delete();
        return redirect()->route('subject.create')->with('success', 'Предмет успешно удален');
    }
}
