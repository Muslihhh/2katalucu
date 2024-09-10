<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="bg-white w-full border shadow-2xl rounded-md p-5 flex gap-5">
      <div class="w-1/2">
        @foreach ($products as $product)
        <a href="{{ route('products.show', $product->id) }}">
            <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}">
            <h3>{{ $product->name }}</h3>
  
      </div>
      <div class="w-1/2">
          <div class="h-1/2">
              {{-- Menampilkan nama produk --}}
              <h1 class="text-3xl font-bold border-b border-black">{{ $product->name }}</h1>
              {{-- Menampilkan harga produk --}}
              <h2 class="text-2xl py-5">${{ $product->price }}</h2>

              {{-- Menampilkan rating menggunakan ikon --}}
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>

              {{-- Detail produk --}}
              <h3 class="underline-offset-4 underline">Detail</h3>
              <p>Deskripsi: {{ $product->description }}</p>
              <p>Stok: {{ $product->stock ?? 'N/A' }}</p>
              <p>Kategori: {{ $product->category->name ?? 'N/A' }}</p>
          </div>
          <div class="flex gap-5 h-1/2 items-end">
              {{-- Tombol Add to Cart --}}
              <button class="fa fa-shopping-cart w-1/2 h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md">Add to Cart</button>

              {{-- Tombol Order dengan WhatsApp --}}
              <a href="{{ route('sendWhatsAppLink') }}" class="btn btn-primary">
                  <button class="fa fa-whatsapp h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md w-auto px-20">Order</button>
              </a>

              {{-- Tombol untuk menambah produk --}}
              <a href="{{ route('products.create') }}">
                  <button class="fa fa-whatsapp h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md w-auto px-20">Tambah</button>
              </a>
          </div>
      </div>
      </a>
      @endforeach
  </div>
</x-layout>
