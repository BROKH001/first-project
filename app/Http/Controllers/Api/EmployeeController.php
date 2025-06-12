<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        return EmployeeModel::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'age' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'position' => 'required|string',
            'salary' => 'required'
        ]);

        $emp = EmployeeModel::create($validated);
        return response()->json($emp, 201);
    }

    public function show($id)
    {
        $emp = EmployeeModel::find($id);

        if (!$emp) return response()->json(['message' => 'Employee Not Found!']);

        return response()->json($emp);
    }

    public function update(Request $request, $id)
    {
        $emp = EmployeeModel::find($id);

        if (!$emp) return response()->json(['message' => 'Employee Not Found'], 404);

        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'age' => 'sometimes|required|string',
            'gender' => 'sometimes|required|string',
            'phone' => 'sometimes|required|string',
            'position' => 'sometimes|required|string',
            'salary' => 'sometimes|required|numeric'
        ]);

        $emp->fill($validated);
        $emp->save();

        return response()->json([
            'message' => 'Employee updated successfully!',
            'employee' => $emp
        ], 200);
    }

    public function destroy($id)
    {
        $emp = EmployeeModel::find($id);

        if (!$emp) return response()->json(['message' => 'Not Found'], 404);
        $emp->delete();

        return response()->json([
            'employee' => $emp,
            'message' => 'Deleted Successfully!'
        ]);
    }
}
