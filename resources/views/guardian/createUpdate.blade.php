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
        <h4 class="" class=""><i class="bi bi-journal-text"></i> Guardian create</h4>
        <a href="@route('guardian.index')" class="btn btn-primary"> <i class="ri-file-list-2-line"></i>
            Guardian list</a>
    </div>

    <div class="card">
        <div class="card-body">
            <section class="py-3">
                <div class="container">
                    <form
                        action="{{ isset($guardian) ? route('guardian.update', $guardian->guardian_id) : route('guardian.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        @if (isset($guardian))
                            @method('PUT') <!-- Use PUT method when updating -->
                        @endif

                        <!-- Select Student and Name (Two inputs in one row) -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="student_id" class="form-label">Select Student</label>
                                <select name="student_id" class="form-select" required>
                                    @foreach ($students as $item)
                                        <option value="{{ $item->student_id }}"
                                            {{ isset($guardian) && $guardian->student_id == $item->student_id ? 'selected' : '' }}>
                                            {{ $item->first_name . ' ' . $item->last_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required
                                    value="{{ isset($guardian) ? $guardian->name : old('name') }}">
                            </div>

                             <div class="col-md-12">
                                <label for="name" class="form-label">Id Card Generate</label>
                                <input type="text" name="id_card_generate" class="form-control" required
                                    value="{{ isset($guardian) ? $guardian->id_card_generate : old('id_card_generate') }}">
                            </div>
                        </div>

                        <!-- Phone and Email (Two inputs in one row) -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" required
                                    value="{{ isset($guardian) ? $guardian->phone : old('phone') }}">
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required
                                    value="{{ isset($guardian) ? $guardian->email : old('email') }}">
                            </div>
                        </div>

                        <!-- Profile Picture (Single input in a row) -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="profile_pic" class="form-label">Profile Picture</label>
                                <input type="file" name="profile_pic" class="form-control">
                                @if (isset($guardian) && $guardian->profile_pic)
                                    <img src="{{ asset($guardian->profile_pic) }}" alt="Profile Image" height="50"
                                        width="50">
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button (Single button in a row) -->
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($guardian) ? 'Update' : 'Create' }} Parent
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
