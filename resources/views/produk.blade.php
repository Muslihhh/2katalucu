<x-layout>
<<<<<<< HEAD
      <div class="bg-white lg:flex sm:content-center w-full border rounded-md p-5 gap-5">
        <div class="lg:w-1/2 sm:w-full">
          <img class="w-full rounded-md" src="{{ asset('storage/public/images/' . $product->image) }}" alt="{{ $product->name }}" alt="">
        </div>
        <div class="lg:w-1/2 sm:w-full">
            <div class="h-1/2">
                <h1 class=" text-3xl font-bold border-b border-black ">Nama Produk</h1>
                <h2 class=" text-2xl py-5 ">${{ $product->price }}</h2>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <h3 class=" underline-offset-4 underline">Detail</h3>
                <p>Stok : {{ $product->stock ?? 'N/A' }}</p>
                <a href="http://"><p class="">Kategori : {{ $product->category->name ?? 'N/A' }}</p> </a>
                <p class=" over">Deskripsi : {{ $product->description }}</p>
=======
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="bg-white w-full border shadow-2xl rounded-md p-5 flex gap-5">
       
            <div class="w-1/2">
                <a href="{{ route('products.show', $product->id) }}">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                </a>
>>>>>>> 2bec99bdaeae368a66f7f032e7e87af2b873de78
            </div>
            <div class="w-1/2">
                <div class="h-1/2">
                    <h1 class="text-3xl font-bold border-b border-black">{{ $product->name }}</h1>
                    <h2 class="text-2xl py-5">${{ $product->price }}</h2>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <h3 class="underline-offset-4 underline">Detail</h3>
                    <p>Deskripsi: {{ $product->description }}</p>
                    <p>Stok: {{ $product->stock ?? 'N/A' }}</p>
                    <p>Kategori: {{ $product->category->name ?? 'N/A' }}</p>
                </div>
                <div class="flex gap-5 h-1/2 items-end">
                    <button class="fa fa-shopping-cart w-1/2 h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md">Add to Cart</button>
                    <a href="{{ route('sendWhatsAppLink') }}" class="btn btn-primary">
                        <button class="fa fa-whatsapp h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md w-auto px-20">Order</button>
                    </a>
                </div>
            </div>
          </div>
<<<<<<< HEAD
        </div>
          <div>
            <i>(Rating)</i>
              <p class="text-base text-gray-500 dark:text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur beatae nostrum provident ab nisi aliquam nesciunt quaerat? Eveniet distinctio alias consequatur, similique, voluptatibus vel repellendus eius aliquid culpa dignissimos deleniti?</p>
          </div>
      </div>
</x-layout>
=======
    </div>
</x-layout>
>>>>>>> 2bec99bdaeae368a66f7f032e7e87af2b873de78
