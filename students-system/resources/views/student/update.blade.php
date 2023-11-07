@extends('layout')
@section('title', 'Home')
@section('content')
<div class="container">
    <form style="width: 500px" class="ms-auto me-auto mt-5" action="/student/update/{{$student['id']}}" method="POST">
        @csrf
        @method('PUT')
        <h1>Update Student</h1>
        <div class="mb-3">
            <label for="sudent_id" class="form-label">Student ID</label>
            <input type="number" name="student_id" class="form-control" id="sudent_id" value="{{$student->student_id}}">
        </div>
        <div class="mb-3">
            <label for="student_name" class="form-label">Student Name</label>
            <input type="text" name="student_name" class="form-control" id="student_id"
                value="{{$student->student_name}}">
        </div>
        <div class=" mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" name="age" class="form-control" id="age" value="{{$student->age}}">
        </div>
        <div class=" mb-3">
            <label for="residence_location" class="form-label">Residence Location</label>
            <input type="text" name="residence_location" class="form-control" id="residence_location"
                value="{{$student->residence_location}}">
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>
@endsection