@extends('layouts.public')

@section("title", "Laravel aplikacija")

@section("content")
<style>
    body {
        background-color: #f8f9fa;
    }
    .category-header {
        background-color: #0d6efd;
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
    }
    .product-card {
        transition: 0.3s;
    }
    .product-card:hover {
        transform: scale(1.01);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="container mt-5">
    <div class="category-header mb-4 shadow-sm">
        <h1 class="mb-2">Kategorija: {{ $category->name }}</h1>
        <p class="mb-0">{{ $category->description }}</p>
    </div>

    <h2 class="mb-4">Kursevi u ovoj kategoriji</h2>

    <div class="row">
        @forelse($category->products as $product)
            <div class="col-md-6 mb-4">
                <div class="card product-card shadow-sm h-100">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="card-text">{{ $product->description }}</p>
                        <p><strong>Cena:</strong> {{ number_format($product->price, 2) }} EUR</p>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-primary">Pogledaj detalje</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Nema dostupnih kurseva u ovoj kategoriji.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@section("sidebar")
    @include('partials.sidebar')
@endsection
