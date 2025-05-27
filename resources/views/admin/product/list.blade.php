@extends("layouts.admin")

@section("title", "Katalog")

@section("content")

<div class="text-center mt-5">
    <h1>Kupovni, prodajni i srednji kursevi dostupnih valuta</h1>
    <p class="lead">Ovde možete pratiti aktuelne kurseve valuta.</p>
</div>
<a href="{{ route('admin.product.create') }}" class="btn btn-success">Dodaj novi kurs valute </a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Ime</th>
            <th>Kurs</th>
            <th>Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">Izmeni</a>
                <form action="{{ route('admin.product.delete', $product->id) }}" 
                  method="POST" style="display: inline;"
                  onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovaj proizvod?')">

                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Obriši</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection