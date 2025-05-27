@extends("layouts.admin")

@section("title", "katalog")

@section("content")

<h1>Unos novog proizvoda</h1>
<form method="POST" action="{{ route('admin.product.insert') }}">
    @csrf
    <div class="form-group">
        <label for="name">Ime proizvoda:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="price">Cena:</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="description">Opis:</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="category_id">Kategorija:</label>
        <select class="form-control" id="category_id" name="category_id" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Dodaj proizvod</button>
    <a href="{{ route('admin.product') }}" class="btn btn-secondary">Nazad</a>
</form>

@endsection