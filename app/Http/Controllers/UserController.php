<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelpers;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.createUpdate');
    }

    public function store(UserRequest $request)
    {
        // Get all input data
        $input = $request->all();

        // Handle file upload if profile pic exists
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $storagePath = 'images/users';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $image = ImageHelpers::resizeImage($file);
            $path = ImageHelpers::saveImage($image, $storagePath, $fileName);
            $input['profile_pic'] = $path;
        }
        $input['password'] = Hash::make($request->password);
        $input['text_password'] = $request->password;
        $input['created_by'] = Auth::id();
        User::create($input);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $parent = User::findOrFail($id);
        return view('user.show', compact('parent'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.createUpdate', compact('user'));
    }

    public function update(UserRequest $request, user $user)
    {
        
        $input = $request->all();
        // Handle file upload if profile pic exists
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $storagePath = 'images/users';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $image = ImageHelpers::resizeImage($file);
            $path = ImageHelpers::saveImage($image, $storagePath, $fileName);
            $input['profile_pic'] = $path;
        } else {
            $input['profile_pic'] = $user->profile_pic;
        }
        $input['updated_by'] = Auth::id();
        $user->update($input);
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $parent = User::findOrFail($id);
        $parent->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
