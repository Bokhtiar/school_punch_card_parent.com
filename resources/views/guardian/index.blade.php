@extends('layouts.app')

@section('content')
<h1>Guradian List</h1>
<a href="{{ route('guardian.create') }}" class="btn btn-success">Create New Parent</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($guardian as $parent)
        <tr>
            <td>{{ $parent->id }}</td>
            <td>{{ $parent->user_id }}</td>
            <td>{{ $parent->name }}</td>
            <td>{{ $parent->phone }}</td>
            <td>{{ $parent->email }}</td>
            <td>
                {{-- <a href="{{ route('guardian.show', $parent->id) }}">View</a>
                <a href="{{ route('guardian.edit', $parent->id) }}">Edit</a>
                <form action="{{ route('guardian.destroy', $parent->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
