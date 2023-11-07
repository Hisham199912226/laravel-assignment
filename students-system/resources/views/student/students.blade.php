@extends('layout')
@section('title', 'Students')
@section('content')
<div class="container w-75 p-3 h-75 ">
    @if(session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <div style="margin-left: 4px; margin-bottom: 8px">
        <h1>Students</h1>
        @can('create', App\Models\Student::class)
        <button type="button" class="btn btn-primary" onclick="location.href='{{ route('create') }}'">Add
            Student</button>
        @endcan
    </div>

    @foreach ($students as $student)
    <div class="container gap-3 d-flex .flex-column p-1 justify-content-evenly flex-wrap">
        <div class="card w-100 ">
            <div class="card-body">
                <h5 class="card-title">Name: {{$student->student_name}}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Student ID: {{$student->student_id}}</h6>
                <p class="card-text">Residence Location: {{$student->residence_location}}</p>
                <p class="card-text">Age: {{$student->age}}</p>
                <div class="d-flex gap-2">
                    @can('update', App\Models\Student::class)
                    <a href="/student/update/{{$student['id']}}" class="btn btn-primary btn-sm ">Edit</a>
                    @endcan
                    @can('delete',App\Models\Student::class)
                    <form action="/student/delete/{{$student['id']}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection