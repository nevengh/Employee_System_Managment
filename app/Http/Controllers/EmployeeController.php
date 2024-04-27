<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee=Employee::all();
        $employee=Employee::with('projects')->get();
        $trashData=Employee::onlyTrashed()->get();
        return response()->json([
                'status'=>'success',
                'employee'=>$employee,
                'trashedData'=>$trashData
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
            'department_id' => 'required|exists:departments,id',

        ]);
        $employee=Employee::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'position'=>$request->position,
            'department_id'=>$request->department_id,
        ]);
        $employee->projects()->attach($request->project_id);

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
            'department_id' => 'nullable|exists:departments,id',
        ]);
        $employee->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'position'=>$request->position,
            'department_id'=>$request->department_id,
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
        $employee->projects()->detach();
        return response()->json([
            'status' => 'delete success'
        ]);
    }
}
