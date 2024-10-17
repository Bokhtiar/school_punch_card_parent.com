@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Guardian List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Guardians</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <!-- Header section with title and create button -->
                <div class="my-2 d-flex justify-content-between align-items-center shadow bg-white p-3 rounded">
                    <h4><i class="bi bi-person-lines-fill"></i> Guardian List</h4>
                    <a href="{{ route('guardian.create') }}" class="btn btn-success"> <i class="ri-file-list-2-line"></i>Create New Parent</a>
                </div>

                <!-- Card containing the guardian table -->
                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Student Name</th>
                                    <th>Guardian Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($guardian as $parent)
                                    <tr>
                                        <td>
                                            <img class="rounded-circle" height="50" width="50"
                                                    src="{{ asset($parent->profile_pic) }}" alt="">
                                        </td>
                                        <td>{{ $parent->student->first_name }} {{ $parent->student->last_name }}</td>
                                        <td>{{ $parent->name }}</td>
                                        <td>{{ $parent->phone }}</td>
                                        <td>{{ $parent->email }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a class="btn btn-success btn-sm" href="{{ route('guardian.edit', $parent->guardian_id) }}">
                                                <i class="ri-edit-2-fill"></i>
                                            </a>

                                            <!-- Delete Button with confirmation -->
                                            <form action="{{ route('guardian.destroy', $parent->guardian_id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this guardian?');">
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
                            {{ $guardian->links() }} <!-- This generates the pagination links -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
