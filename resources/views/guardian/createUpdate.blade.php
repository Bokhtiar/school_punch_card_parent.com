@extends('layouts.app')

@section('content')
<h1>Create Parent</h1>
<form action="{{ route('guardian.store') }}" method="POST">
    @csrf
    <label>Select student</label>
    <select name="student_id" id="">
        @foreach ($students as $item)
        <option value="{{$item->student_id}}">{{$item->last_name}}</option>    
        @endforeach
        
    </select>


    <label>Name</label>
    <input type="text" name="name" required>
    <label>Phone</label>
    <input type="text" name="phone" required>
    <label>Email</label>
    <input type="email" name="email" required>
    <button type="submit">Create</button>
</form>
@endsection
