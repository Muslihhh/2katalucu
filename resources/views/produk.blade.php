<x-layout>
<<<<<<< HEAD
  <x-slot:title>{{ $title }}</x-slot:title>
    <div class="bg-white w-full border  shadow-2xl rounded-md p-5 flex gap-5">
      <div class="w-1/2">
        <img class="w-full rounded-md" src="https://i.pinimg.com/736x/28/7c/b5/287cb5bee3282583abe7836cc2f15465.jpg" alt="">
      </div>
      <div class="w-1/2">
          <div class="h-1/2">
              <h1 class=" text-3xl font-bold border-b border-black ">Nama Produk</h1>
              <h2 class=" text-2xl py-5 ">$99</h2>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <h3 class=" underline-offset-4 underline">Detail</h3>
              <p>Deskripsi : </p>
              <p>Stok : </p>
              <p>Kategori : </p>
          </div>
          <div class="flex gap-5 h-1/2 items-end ">

            <!-- Form untuk Add to Cart -->
            <form action="{{ route('checkout.process') }}" method="POST">
              @csrf
              <button type="submit" class="fa fa-shopping-cart h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md w-auto px-20"> Add to Cart</button>
            </form>            
          
            <!-- Tombol untuk Order via WhatsApp -->
            <a href="{{ route('sendWhatsAppLink') }}" class="btn btn-primary">   
              <button class=" fa fa-whatsapp  h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md w-auto px-20"> Order</button>
            </a>
          </div>
      </div>
    </div>
</x-layout>
=======
      <div class="bg-white lg:flex sm:content-center w-full border rounded-md p-5 gap-5">
        <div class="lg:w-1/2 sm:w-full">
          <a class="" href="{{ route('products.show', $product->id) }}">
              <img class=" object-cover lg:w-full sm:w-full" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
          </a>
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
>>>>>>> e820c8ff5f60e2f7aba0deef5694651b35cf188e
