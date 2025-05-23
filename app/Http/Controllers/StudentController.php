<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $student = StudentModel::all();
        return view('students.index', ['students' => $student]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $r)
    {
        $r->validate(['sname' => 'required']);
        StudentModel::create($r->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show(StudentModel $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(StudentModel $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, StudentModel $student)
    {
        $request->validate(['sname' => 'required']);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(StudentModel $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
