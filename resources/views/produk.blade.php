<x-layout>
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
