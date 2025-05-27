@extends('layouts.public')

@section('title', 'Svi proizvodi')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    .product-card {
        transition: 0.3s;
    }
    .product-card:hover {
        transform: scale(1.01);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .category-card a {
        font-weight: 500;
    }
    .category-card:hover {
        background-color: #e9ecef;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <!-- Leva kolona - svi proizvodi -->
        <div class="col-md-8">
            <h2 class="mb-4">Sve valute</h2>

            @foreach ($products as $product)
                <div class="card mb-4 shadow-sm rounded product-card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ $product->name }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $product->description }}</p>
                        <p><strong>Cena:</strong> {{ number_format($product->price, 2) }} RSD</p>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-primary">Detalji</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Desna kolona - kategorije -->
        <div class="col-md-4">
            <h4 class="mb-3">Kategorije</h4>

            @foreach ($categories as $category)
                <div class="card mb-3 shadow-sm border-0 category-card">
                    <div class="card-body p-3">
                        <a href="{{ route('product.category', $category->id) }}" class="text-decoration-none text-dark d-block">
                            {{ $category->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
