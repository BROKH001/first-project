<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return StudentModel::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string']);
        $student = StudentModel::created($validated);
        return response()->json($student, 201);
    }

    public function show($id)
    {
        $student = StudentModel::find($id);
        if (!$student) return response()->json(['message' => 'Not Found'], 404);

        return $student;
    }

    public function update(Request $request, $id)
    {
        $student = StudentModel::find($id);
        if (!$student) return response()->json(['message' => 'Not Found'], 404);

        $validated = $request->validate(['name' => 'required|string']);
        $student->update($validated);

        return response()->json($student);
    }

    public function destroy($id)
    {
        $student = StudentModel::find($id);

        if (!$student) return response()->json(['message' => 'Not Found'], 404);
        $student->delete();
        return response()->json(['message' => 'Deleted Successfully']);
    }
}
