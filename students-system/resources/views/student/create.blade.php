@extends('layout')
@section('title', 'Home')
@section('content')
<div class="container">
    <form style="width: 500px" class="ms-auto me-auto mt-5" action="{{route('createStudent')}}" method="POST">
        @csrf
        <h1>Add Student</h1>
        <div class="mb-3">
            <label for="sudent_id" class="form-label">Student ID</label>
            <input type="number" name="student_id" class="form-control" id="sudent_id">
        </div>
        <div class="mb-3">
            <label for="student_name" class="form-label">Student Name</label>
            <input type="text" name="student_name" class="form-control" id="sudent_id">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" name="age" class="form-control" id="age">
        </div>
        <div class="mb-3">
            <label for="residence_location" class="form-label">Residence Location</label>
            <input type="text" name="residence_location" class="form-control" id="residence_location">
        </div>

        <button type="submit" class="btn btn-primary">Add Student</button>
    </form>
</div>
@endsection