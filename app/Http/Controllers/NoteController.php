<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $employee=Employee::where('id',$request->employee_id)->first();
        // $employee->notes()->create([
        //     'note'=>$request->notes
        // ]);
        // $note = Note::create([
        //     'note' => $request->input('note'),
        //     'notable_id' => $request->notable_id,
        //     'notable_type' => $request->notable_type,
        // ]);
        // return response()->json($note, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        // $note->update([
        //     'body' => $request->input('note'),
        // ]);
        // return response()->json($note, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
