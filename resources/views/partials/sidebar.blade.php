<div class="list-group mb-4 shadow-sm">
    @foreach ($categories as $category)
        <a href="{{ route('product.category', $category->id) }}" class="list-group-item list-group-item-action">
            {{ $category->name }}
        </a>
    @endforeach
</div>
