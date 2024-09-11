<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Nama Produk</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="price">Harga</label>
        <input type="number" name="price" id="price" step="0.01" required>
    </div>

    <div>
        <label for="description">Deskripsi</label>
        <textarea name="description" id="description" required></textarea>
    </div>

    <select name="category_id" id="category_id" required>
        @if($categories->isEmpty())
            <option value="">No categories available</option>
        @else
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        @endif
    </select>
    

    <div>
        <label for="image">Gambar</label>
        <input type="file" name="image" id="image" accept="image/*">
    </div>

    <button type="submit">Simpan Produk</button>
</form>


{{-- <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"> --}}
