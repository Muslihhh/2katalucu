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
                <button class=" fa fa-shopping-cart w-1/2 h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md"> Add to Cart</button>
                <button class=" fa fa-whatsapp w-1/2 h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md"> Order</button>
            </div>
        </div>
      </div>
</x-layout>