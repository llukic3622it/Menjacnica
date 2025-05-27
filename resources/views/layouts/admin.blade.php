<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @yield("title")
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('slike/malifrancjozef-prednja.jpg') }}" alt="Menjacnica" style="height: 30px;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin')}}">Početna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.product')}}">Kursevi</a>
                </li>

                <li class="nav-item">
                    
                    <a class="nav-link" href="{{ route('korisnici.index') }}" >Korisnici</a>
                </li>

            
                <li class="nav-item">
                    
                    <a class="nav-link" href="{{ route('racuni.index') }}">Racuni</a>
                </li>

                @auth
                    <li class="nav-item" style="margin-left: 300px;">
                        <span class="text-light">
                            Zdravo
                            {{ Auth::user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link">Logout</button>
                        </form>
                    </li>

                    
                @endauth
            </ul>
        </div>
    </div>
</nav>

@if(Session::has('success'))
    <div class="container-fluid bg-success text-white p-3">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="container-fluid bg-danger text-white p-3">
        {{ Session::get('error') }}
    </div>
@endif

<div class="container-fluid">
    @yield("content")
</div>

</body>
</html>