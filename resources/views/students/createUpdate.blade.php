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

        <form action="@route('student.store')" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="p-2" type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}">
            <input class="p-2" type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
            <input class="p-2" type="text" name="class" placeholder="Class" value="{{ old('class') }}">
            <input class="p-2" type="text" name="section" placeholder="Section" value="{{ old('section') }}">
            <input class="p-2" type="text" name="roll_no" placeholder="Roll No" value="{{ old('roll_no') }}">
            <input class="p-2" type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}">
            <input class="p-2" type="text" name="address" placeholder="Address" value="{{ old('address') }}">
            <input class="p-2" type="date" name="dob" value="{{ old('dob') }}">
            <input class="p-2" type="file" name="profile_pic">
            <input class="p-2" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            <button type="submit">Submit</button>
        </form>
    </section>
@endsection
