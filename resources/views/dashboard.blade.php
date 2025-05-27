<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Menjacnica</a>
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.all') }}">Pocetna strana</a>
            
            </li>
            
      </ul>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">Odjava</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="mb-4">Dobrodošao, {{ Auth::user()->name }}!</h2>
        <p>Ovo je tvoj korisnički panel.</p>

        <div class="mt-4">
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Kreiran:</strong> {{ Auth::user()->created_at->format('d.m.Y H:i') }}</p>
        </div>
    </div>
</div>

</body>
</html>