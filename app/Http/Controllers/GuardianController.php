<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelpers;
use App\Http\Requests\GuardianRequest;
use App\Models\Guardian;
use App\Models\Student;

class GuardianController extends Controller
{
    public function index()
    {
        $guardian = Guardian::latest()->paginate(10);
        return view('guardian.index', compact('guardian'));
    }

    public function create()
    {
        $students = Student::all();
        return view('guardian.createUpdate', compact('students'));
    }

    public function store(GuardianRequest $request)
    {
        // Get all input data
        $input = $request->all();

        // Handle file upload if profile pic exists
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            // Define storage path and file name
            $storagePath = 'images/guardians';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            // Use ImageHelpers to resize and save the image
            $image = ImageHelpers::resizeImage($file);
            $path = ImageHelpers::saveImage($image, $storagePath, $fileName);
            $input['profile_pic'] = $path;
        }

        // Create the student record
        Guardian::create($input);

        return redirect()->route('guardian.index')->with('success', 'Guardian created successfully.');
    }

    public function show($id)
    {
        $parent = Guardian::findOrFail($id);
        return view('guardian.show', compact('parent'));
    }

    public function edit($id)
    {
        $students = Student::all();
        $guardian = Guardian::findOrFail($id);
        return view('guardian.createUpdate', compact('guardian', 'students'));
    }

    public function update(GuardianRequest $request, Guardian $guardian)
    {
        $input = $request->all();
        // Handle file upload if profile pic exists
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $storagePath = 'images/guardians';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $image = ImageHelpers::resizeImage($file);
            $path = ImageHelpers::saveImage($image, $storagePath, $fileName);
            $input['profile_pic'] = $path;
        } else {
            $input['profile_pic'] = $guardian->profile_pic;
        }

        $guardian->update($input);
        return redirect()->route('guardian.index')->with('success', 'Parent updated successfully.');
    }

    public function destroy($id)
    {
        $parent = Guardian::findOrFail($id);
        $parent->delete();
        return redirect()->route('guardian.index')->with('success', 'Parent deleted successfully.');
    }
}
