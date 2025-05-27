@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodaj novi korisnički profil</h1>

    <form action="{{ route('korisnici.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">ID korisnika</label>
            <input type="number" name="user_id" id="user_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Telefon</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Adresa</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Datum rođenja</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Biografija</label>
            <textarea name="bio" id="bio" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Sačuvaj profil</button>
        <a href="{{ route('korisnici.index') }}" class="btn btn-secondary">Nazad</a>
    </form>
</div>
@endsection
