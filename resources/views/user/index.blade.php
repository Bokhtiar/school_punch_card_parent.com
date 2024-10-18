@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>User List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <!-- Header section with title and create button -->
                <div class="my-2 d-flex justify-content-between align-items-center shadow bg-white p-3 rounded">
                    <h4><i class="bi bi-person-lines-fill"></i> user List</h4>
                    <a href="{{ route('user.create') }}" class="btn btn-success"> <i class="ri-file-list-2-line"></i>Create New user</a>
                </div>

                <!-- Card containing the guardian table -->
                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <img class="rounded-circle" height="50" width="50"
                                                    src="{{ asset($user->profile_pic) }}" alt="">
                                        </td>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a class="btn btn-success btn-sm" href="{{ route('user.edit', $user->id) }}">
                                                <i class="ri-edit-2-fill"></i>
                                            </a>

                                            <!-- Delete Button with confirmation -->
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this user?');">
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
                            {{ $users->links() }} <!-- This generates the pagination links -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
