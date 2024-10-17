@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="my-2 d-flex justify-content-between align-items-center shadow bg-white p-2 rounded align-items-center">
            <h4 class="" class=""><i class="bi bi-journal-text"></i> Student create</h4>
            <a href="@route('student.index')" class="btn btn-primary"> <i class="ri-file-list-2-line"></i>
                Student list</a>
        </div>

        <div class="card">
            <div class="card-body">
                <section class="py-3">
                    <!-- Assuming you're using the same form for both creating and editing a student -->
                    <div class="container">
                        <form
                            action="{{ isset($student) ? route('student.update', $student->student_id) : route('student.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($student))
                                @method('PUT') <!-- For editing, we need to spoof the PUT method -->
                            @endif

                            <div class="row">
                                <!-- First Name and Last Name -->
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="first_name" class="form-label">First Name <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control p-2" id="first_name" type="text" name="first_name"
                                        placeholder="First Name"
                                        value="{{ isset($student) ? $student->first_name : old('first_name') }}">
                                </div>
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="last_name" class="form-label">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control p-2" id="last_name" type="text" name="last_name"
                                        placeholder="Last Name"
                                        value="{{ isset($student) ? $student->last_name : old('last_name') }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Class and Section -->
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="class" class="form-label">Class</label>
                                    <select class="form-select p-2" id="class" name="class">
                                        <option value="1"
                                            {{ isset($student) && $student->class == 1 ? 'selected' : '' }}>Class 1</option>
                                        <option value="2"
                                            {{ isset($student) && $student->class == 2 ? 'selected' : '' }}>Class 2</option>
                                        <option value="3"
                                            {{ isset($student) && $student->class == 3 ? 'selected' : '' }}>Class 3</option>
                                        <option value="4"
                                            {{ isset($student) && $student->class == 4 ? 'selected' : '' }}>Class 4</option>
                                        <option value="5"
                                            {{ isset($student) && $student->class == 5 ? 'selected' : '' }}>Class 5</option>
                                        <option value="6"
                                            {{ isset($student) && $student->class == 6 ? 'selected' : '' }}>Class 6</option>
                                        <option value="7"
                                            {{ isset($student) && $student->class == 7 ? 'selected' : '' }}>Class 7
                                        </option>
                                        <option value="8"
                                            {{ isset($student) && $student->class == 8 ? 'selected' : '' }}>Class 8
                                        </option>
                                        <option value="9"
                                            {{ isset($student) && $student->class == 9 ? 'selected' : '' }}>Class 9
                                        </option>
                                        <option value="10"
                                            {{ isset($student) && $student->class == 10 ? 'selected' : '' }}>Class 10
                                        </option>

                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="section" class="form-label">Section</label>
                                    <input class="form-control p-2" id="section" type="text" name="section"
                                        placeholder="Section"
                                        value="{{ isset($student) ? $student->section : old('section') }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Roll No and Phone -->
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="roll_no" class="form-label">Roll No <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control p-2" id="roll_no" type="text" name="roll_no"
                                        placeholder="Roll No"
                                        value="{{ isset($student) ? $student->roll_no : old('roll_no') }}">
                                </div>
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input class="form-control p-2" id="phone" type="text" name="phone"
                                        placeholder="Phone" value="{{ isset($student) ? $student->phone : old('phone') }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Address and Date of Birth -->
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="address" class="form-label">Address <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control p-2" id="address" type="text" name="address"
                                        placeholder="Address"
                                        value="{{ isset($student) ? $student->address : old('address') }}">
                                </div>
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="dob" class="form-label">Date of Birth <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control p-2" id="dob" type="date" name="dob"
                                        value="{{ isset($student) ? $student->dob : old('dob') }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Profile Picture and Email -->
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="profile_pic" class="form-label">Profile Picture</label>
                                    <input class="form-control p-2" id="profile_pic" type="file" name="profile_pic">
                                    @if (isset($student) && $student->profile_pic)
                                        <img src="{{ asset($student->profile_pic) }}" alt="Profile Image" height="50"
                                            width="50">
                                    @endif
                                </div>
                                <div class="col-sm-12 col-md-6 mb-3">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control p-2" id="email" type="email" name="email"
                                        placeholder="Email"
                                        value="{{ isset($student) ? $student->email : old('email') }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Submit Button -->
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($student) ? 'Update' : 'Create' }} Student
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>

    </section>
@endsection
