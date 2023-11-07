@extends('layout')
@section('title', 'Login')
@section('content')
<div class="container">

    <form style="width: 500px" class="ms-auto me-auto mt-5" action="{{route('loginPost')}}" method="post">
        @if($errors->any())
        <div class="col-12">
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @csrf
        <h1>Login</h1>
        <div class="mb-3">
            <label for="exampleInputEmail" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection