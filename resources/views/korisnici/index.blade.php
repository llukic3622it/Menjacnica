@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Korisnički profili</h1>

    <a href="{{ route('korisnici.create') }}" class="btn btn-success mb-3">Dodaj profil</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Profila korisnika</th>
                <th>Telefon</th>
                <th>Adresa</th>
                <th>Datum rođenja</th>
                <th>Biografija</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profile)
            <tr>
                <td>{{ $profile->user_id }}</td>
                <td>{{ $profile->phone_number }}</td>
                <td>{{ $profile->address }}</td>
                <td>{{ $profile->date_of_birth }}</td>
                <td>{{ \Illuminate\Support\Str::limit($profile->bio, 50) }}</td>
                <td>{{ $profile->created_at }}</td>
                <td>{{ $profile->updated_at }}</td>
                <td>
                    <a href="{{ route('korisnici.edit', $profile->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('korisnici.destroy', $profile->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Da li ste sigurni?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
