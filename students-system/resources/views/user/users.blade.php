@extends('layout')
@section('title', 'Users')
@section('content')
<div class="container w-75 p-3 h-75 ">
    @if(session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <h1>Admins</h1>
    <ul class="list-group">
        @foreach ($users as $user)
        @if ($user->is_admin)
        <li class="list-group-item d-flex justify-content-between align-items-center ">
            {{$user->name}} : {{$user->email}}
        </li>
        @endif
        @endforeach
    </ul>

    <h1>Regular Users</h1>
    <ul class="list-group">
        @foreach ($users as $user)
        @if (!$user->is_admin)
        <li class="list-group-item d-flex justify-content-between align-items-center ">
            {{$user->name}} : {{$user->email}}
            <span class="badge badge-primary badge-pill">
                <form action="/users/promote/{{$user->id}}" method="POST">
                    @csrf
                    @method('PUT');
                    <button type="submit" class="btn btn-secondary">Promote</button>
                </form>
            </span>
        </li>
        @endif
        @endforeach
    </ul>

</div>

@endsection