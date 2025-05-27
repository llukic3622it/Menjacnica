<nav class="navbar navbar-expand-sm navbar-light bg-light">
  <div class="container-fluid">

    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('malifrancjozef-prednja.png') }}" alt="Logo" style="height: 40px;">
            {{-- Možeš podesiti širinu i visinu po potrebi --}}
    </a>
    <a class="navbar-brand" href="{{ route('home') }}">Početna</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" 
            aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <!-- Glavni linkovi levo -->
      <ul class="navbar-nav me-auto mb-2 mb-sm-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.all') }}">Sve valute</a>
          
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">Kontakt</a>
          
        </li>
      </ul>

      <!-- User menu desno -->
      <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
        @auth
          <li class="nav-item d-flex align-items-center me-3">
            <span class="text-dark">
              Zdravo, <strong>{{ Auth::user()->name }}</strong>
            </span>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="{{ route('profile.edit') }}">Moj profil</a>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-link nav-link p-0" style="display:inline; cursor:pointer;">Logout</button>
            </form>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Prijava</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registracija</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
