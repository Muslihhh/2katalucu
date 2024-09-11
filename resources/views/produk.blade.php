<x-layout>
<<<<<<< HEAD
    <x-slot:title>{{ $title }}</x-slot:title>
      <div class="bg-white lg:flex sm:content-center w-full border rounded-md p-5 gap-5">
        <div class="lg:w-1/2 sm:w-full">
          <img class="w-full rounded-md" src="https://i.pinimg.com/736x/28/7c/b5/287cb5bee3282583abe7836cc2f15465.jpg" alt="">
        </div>
        <div class="lg:w-1/2 sm:w-full">
            <div class="h-1/2">
                <h1 class=" text-3xl font-bold border-b border-black ">Nama Produk</h1>
                <h2 class=" text-2xl py-5 ">$99</h2>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <h3 class=" underline-offset-4 underline">Detail</h3>
                <p>Stok : </p>
                <p>Kategori : </p> 
                <p>Deskripsi : </p>
            </div>
            <div class="flex gap-5 h-1/2 items-end ">
              <a href="http://" class="w-1/2">
                <button class=" fa fa-shopping-cart w-full h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md"> Add to Cart</button>
              </a>  
              <a href="{{ route('sendWhatsAppLink') }}" class="w-1/2">
                <button class=" fa fa-whatsapp w-full  h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md "> Order</button>
              </a>
            </div>
        </div>
      </div>
      <div class="mt-20  border-t pt-10 border-black">
        <div class="grid border-b border-gray-400 bg-white p-8 items-center w-full text-sm text-gray-900 dark:text-white">
          <div class=" flex">
          <img class="mr-4 w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
          <div class="content-start">
          <p class="text-xl font-bold text-gray-900 dark:text-white">Pembeli Baik Hati</p>
          <p class="text-gray-600"> 2 jam yang lalu</p>
          </div>
        </div>
          <div>
            <i>(Rating)</i>
              <p class="text-base text-gray-500 dark:text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur beatae nostrum provident ab nisi aliquam nesciunt quaerat? Eveniet distinctio alias consequatur, similique, voluptatibus vel repellendus eius aliquid culpa dignissimos deleniti?</p>
          </div>
      </div>
      </div>
</x-layout>
=======
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
>>>>>>> a4da50c6a26fb45cab4c12bbf5f5f12934876dd2
