@extends("layouts.admin")

@section("title", $product->name)

@section("content")

<h1>Izmena proizvoda {{$product->name}}</h1>
<form method="POST" action="{{route('admin.product.update', $product->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Ime proizvoda:</label>
        <input type="text" class="form-control" id="name" name="name" required value="{{$product->name}}">
    </div>
    <div class="form-group">
        <label for="price">Cena:</label>
        <input type="number" class="form-control" id="price" name="price" required value="{{$product->price}}">
    </div>
    <div class="form-group">
        <label for="description">Opis:</label>
        <textarea class="form-control" id="description" name="description" required>{{$product->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="category_id">Kategorija:</label>
        <select class="form-control" id="category_id" name="category_id" required>
            @foreach($categories as $category)
                <option @selected($category->id == $product->category_id) value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Sačuvaj proizvod</button>
    <a href="{{ route('admin.product') }}" class="btn btn-secondary">Nazad</a>
</form>

@endsection