@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista računa</h1>

    <a href="{{ route('racuni.create') }}" class="btn btn-success mb-3">Dodaj račun</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Korisnik</th>
                <th>Broj računa</th>
                <th>Iznos uplate</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($racuni as $racun)
            <tr>
                <td>{{ $racun->id }}</td>
                <td>{{ $racun->user->name ?? 'Nepoznat korisnik' }}</td>
                <td>{{ $racun->broj_racuna }}</td>
                <td>{{ number_format($racun->iznos_uplate, 2) }}</td>
                <td>
                    <a href="{{ route('racuni.edit', $racun->id) }}" class="btn btn-primary btn-sm">Izmeni</a>

                    <form action="{{ route('racuni.destroy', $racun->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj račun?')">Obriši</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
