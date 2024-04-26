<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();
        return response()->json([
            'status' => 'success',
            'project' => $project,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string'
        ]);
        $project=Project::Create([
            'name'=>$request->name
        ]);
        return response()->json([
            'status' => 'success',
            'project' => $project,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return response()->json([
            'status' => 'success',
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name'=>'required|string'
        ]);
        $project->update([
            'name'=>$request->name
        ]);
        return response()->json([
            'status' => 'success',
            'project' => $project,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json([
            'status' => 'delete success'
        ]);
    }
}
