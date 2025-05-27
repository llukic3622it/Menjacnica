@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Izmeni račun</h1>

    <form action="{{ route('racuni.update', $racun->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">Korisnik</label>
            <select name="user_id" id="user_id" class="form-select" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $racun->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="broj_racuna" class="form-label">Broj računa</label>
            <input type="text" name="broj_racuna" id="broj_racuna" class="form-control" value="{{ old('broj_racuna', $racun->broj_racuna) }}" required>
        </div>

        <div class="mb-3">
            <label for="iznos_uplate" class="form-label">Iznos uplate</label>
            <input type="number" step="0.01" name="iznos_uplate" id="iznos_uplate" class="form-control" value="{{ old('iznos_uplate', $racun->iznos_uplate) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
        <a href="{{ route('racuni.index') }}" class="btn btn-secondary">Nazad</a>
    </form>
</div>
@endsection
