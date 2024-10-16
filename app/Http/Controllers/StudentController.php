<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelpers;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.createUpdate');
    }

    public function store(StudentRequest $request)
    {
        // Get all input data
        $input = $request->all();

        // Handle file upload if profile pic exists
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            // Define storage path and file name
            $storagePath = 'images/students';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            // Use ImageHelpers to resize and save the image
            $image = ImageHelpers::resizeImage($file);
            $path = ImageHelpers::saveImage($image, $storagePath, $fileName);
            $input['profile_pic'] = $path;
        }

        // Create the student record
        Student::create($input);
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }


    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(StudentRequest $request, Student $student)
    {
        $input = $request->all();
        if ($request->hasFile('profile_pic')) {
            $imageName = time() . '.' . $request->profile_pic->extension();
            $request->profile_pic->move(public_path('images'), $imageName);
            $input['profile_pic'] = $imageName;
        }

        $student->update($input);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
