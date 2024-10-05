@extends('layouts.app')

@section('content')
<h1>Create Parent</h1>
<form action="{{ route('guardian.store') }}" method="POST">
    @csrf
    <label>User ID</label>
    <input type="number" name="user_id" required>
    <label>Name</label>
    <input type="text" name="name" required>
    <label>Phone</label>
    <input type="text" name="phone" required>
    <label>Email</label>
    <input type="email" name="email" required>
    <button type="submit">Create</button>
</form>
@endsection
