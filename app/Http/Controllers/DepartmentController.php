<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department=Department::all();

        $department=Department::with('employees')->get();
        // return trashed data
        $trashData=Department::onlyTrashed()->get();
        return response()->json([
                'status'=>'success',
                'deprtment'=>$department,
                'trashedData'=>$trashData
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
        ]);
        $department=Department::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return response()->json([
            'status'=>'success',
            'deprtment'=>$department
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return response()->json([
            'status' => 'success',
            'department' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255'
        ]);
        $department->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return response()->json([
            'status' => 'success',
            'department' => $department
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department -> delete();
        return response()->json([
            'status' => 'delete success'
        ]);
    }
}
