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

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div
                        class="my-2 d-flex justify-content-between align-items-center shadow bg-white p-2 rounded align-items-center">
                        <h4 class="" class=""><i class="bi bi-journal-text"></i> Student List</h4>
                        <a href="@route('student.create')" class="btn btn-primary"> <i class=" ri-add-box-line"></i> Create
                            student</a>
                    </div>



                    <div class="card">
                        <div class="card-body">


                            <!-- Table with stripped rows -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Profile Image</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $item)
                                        <tr>
                                            <td>
                                                <img class="rounded-circle" height="50" width="50"
                                                    src="{{ asset($item->profile_pic) }}" alt="">
                                            </td>
                                            <td>{{ $item->first_name }}</td>
                                            <td>{{ $item->last_name }}</td>
                                            <td>Class: {{ $item->class }}</td>
                                            <td>{{ $item->section }}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="@route('student.edit', $item->student_id)"><i
                                                        class="ri-edit-2-fill"></i></a>


                                                <!-- Delete Button -->
                                                <form action="{{ route('student.destroy', $item->student_id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this student?');">
                                                        <i class="ri-delete-bin-2-line"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            <!-- Pagination Links -->
                            <div class="mt-3">
                                {{ $students->links() }} <!-- This generates the pagination links -->
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
@endsection
