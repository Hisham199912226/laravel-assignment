<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Student Registeration System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Logout</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Register</a>
                </li>
                @endauth
            </ul>
            <span class="navbar-text mr-10">@auth{{auth()->user()->name}}@endauth</span>
        </div>
    </div>
</nav>