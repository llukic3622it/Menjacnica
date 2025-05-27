@extends("layouts.public")

@section("title", $product->name . " | Laravel aplikacija")

@section("content")
    <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
    
    <div class="bg-white p-4 rounded-lg shadow mb-4">
        <p class="text-gray-700 mb-4">{{ $product->description }}</p>
        
        <div class="flex gap-4">
            <p class="font-semibold">
                Cena: {{ number_format($product->price, 2, ',', '.') }} EUR
            </p>
            
            <p class="font-semibold">
                Kategorija:
                <a href="{{ route('product.category', $product->category->id) }}" 
                   class="text-blue-600 hover:text-blue-800 transition-colors">
                    {{ $product->category->name }}
                </a>
            </p>
        </div>
    </div>
@endsection

@section("sidebar")
    @include("partials.sidebar")
@endsection