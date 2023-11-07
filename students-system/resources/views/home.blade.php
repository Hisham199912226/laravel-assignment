@extends('layout')
@section('title', 'Home')
@section('content')
<div class="container d-flex justify-content-center align-items-center  vw-100 vh-100">
    <div class="d-grid gap-2 col-6 mx-auto">
        @if(auth()->user()->is_admin)
        <button class="btn btn-primary" type="button" onclick="location.href='{{ route('users') }}'">Show Users</button>
        @endif

        <button class="btn btn-primary" type="button" onclick="location.href='{{ route('students') }}'">Show
            Students</button>
    </div>
</div>
@endsection