<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee=Employee::all();
        return response()->json([
                'status'=>'success',
                'employee'=>$employee
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'position'=>'nullable|string|max:255',
        ]);
        $employee=Employee::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'position'=>$request->position,
        ]);
        return response()->json([
            'status'=>'success',
            'employee'=>$employee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return response()->json([
            'status' => 'success',
            'employee' => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name'=>'nullable|string|max:255',
            'last_name'=>'nullable|string|max:255',
            'email'=>'nullable|string|max:255',
            'position'=>'nullable|string|max:255',
        ]);
        $employee->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'position'=>$request->position,
        ]);
        return response()->json([
            'status' => 'success',
            'employee' => $employee
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee -> delete();
        return response()->json([
            'status' => 'delete success'
        ]);
    }
}