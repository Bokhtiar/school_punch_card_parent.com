<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function index()
    {
        $guardian = Guardian::all();
       
        return view('guardian.index', compact('guardian'));
    }

    public function create()
    {
        $students = Student::all();
        return view('guardian.createUpdate', compact('students')); // Return a form for creating a new parent
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:guardians,phone',
            'email' => 'required|email|unique:guardians,email',
        ]);

        Guardian::create($validated);

        return redirect()->route('guardian.index')->with('success', 'Guardian created successfully.');
    }

    public function show($id)
    {
        $parent = Guardian::findOrFail($id);
        return view('guardian.show', compact('parent'));
    }

    public function edit($id)
    {
        $parent = Guardian::findOrFail($id);
        return view('guardian.edit', compact('parent'));
    }

    public function update(Request $request, $id)
    {
        $parent = Guardian::findOrFail($id);

        $validated = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:parents,phone,' . $parent->id,
            'email' => 'required|email|unique:parents,email,' . $parent->id,
        ]);

        $parent->update($validated);

        return redirect()->route('guardian.index')->with('success', 'Parent updated successfully.');
    }

    public function destroy($id)
    {
        $parent = Guardian::findOrFail($id);
        $parent->delete();

        return redirect()->route('guardian.index')->with('success', 'Parent deleted successfully.');
    }
}
