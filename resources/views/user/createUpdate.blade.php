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

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="my-2 d-flex justify-content-between align-items-center shadow bg-white p-2 rounded align-items-center">
        <h4 class=""><i class="bi bi-journal-text"></i> User Create</h4>
        <a href="@route('user.index')" class="btn btn-primary"> <i class="ri-file-list-2-line"></i> User List</a>
    </div>

    <div class="card">
        <div class="card-body">
            <section class="py-3">
                <div class="container">
                    <form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        @if (isset($user))
                            @method('PUT') <!-- Use PUT method when updating -->
                        @endif

                        <!-- Name and Email (Two inputs in one row) -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required
                                    value="{{ isset($user) ? $user->name : old('name') }}">
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required
                                    value="{{ isset($user) ? $user->email : old('email') }}">
                            </div>
                        </div>

                        <!-- Password and Confirm Password (Two inputs in one row) -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input value="{{ isset($user) ? $user->text_password : old('text_password') }}" type="password" name="password" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input value="{{ isset($user) ? $user->text_password : old('text_password') }}" type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>




                        <!-- Role and Profile Picture -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="">Select Role</option>
                                    <option value="super admin"
                                        {{ isset($user) && $user->role == 'super admin' ? 'selected' : '' }}>Super Admin
                                    </option>
                                    <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="guard" {{ isset($user) && $user->role == 'guard' ? 'selected' : '' }}>
                                        Guard</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="profile_pic" class="form-label">Profile Picture</label>
                                <input type="file" name="profile_pic" class="form-control">
                                @if (isset($user) && $user->profile_pic)
                                    <img src="{{ asset($user->profile_pic) }}" alt="Profile Image" height="50"
                                        width="50">
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($user) ? 'Update' : 'Create' }} User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
