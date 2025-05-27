@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Izmeni profil korisnika</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('korisnici.update', $profile) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="phone_number" class="form-label">Telefon</label>
            <input 
                type="text" 
                name="phone_number" 
                id="phone_number" 
                class="form-control" 
                value="{{ old('phone_number', $profile->phone_number) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Adresa</label>
            <input 
                type="text" 
                name="address" 
                id="address" 
                class="form-control" 
                value="{{ old('address', $profile->address) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Datum rođenja</label>
            <input 
                type="date" 
                name="date_of_birth" 
                id="date_of_birth" 
                class="form-control" 
                value="{{ old('date_of_birth', $profile->date_of_birth ? $profile->date_of_birth->format('Y-m-d') : '') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Biografija</label>
            <textarea 
                name="bio" 
                id="bio" 
                class="form-control" 
                rows="4"
                required
            >{{ old('bio', $profile->bio) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
    </form>
</div>
@endsection
