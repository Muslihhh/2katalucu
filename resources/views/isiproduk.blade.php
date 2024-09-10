<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Nama Produk:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="price">Harga Produk:</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ old('price') }}" required>
        @error('price')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="description">Deskripsi Produk:</label>
        <textarea name="description" id="description" required>{{ old('description') }}</textarea>
        @error('description')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="category_id">Kategori Produk:</label>
        <select name="category_id" id="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="image">Gambar Produk:</label>
        <input type="file" name="image" id="image" accept="image/*">
        @error('image')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Tambah Produk</button>
</form>


{{-- <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"> --}}
