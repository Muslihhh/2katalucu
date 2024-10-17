<x-layout>
    
      <div class="bg-white lg:flex sm:content-center w-full border rounded-md p-5 gap-5">
        <div class="lg:w-1/2 sm:w-full p-5 bg-gray-100">
            <style>
                .swiper-container.gallery-top {
    width: 100%;
    height: 400px;
    position: relative;
    overflow: hidden; /* Atur posisi agar navigasi tidak tergeser */
}

.swiper-slide {
    width: 100%; /* Pastikan tiap slide mengambil lebar penuh */
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.swiper-wrapper {
    display: flex; /* Menyusun slide secara horizontal */
}

.swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Menjaga proporsi gambar */
}


.gallery-thumbs {
    height: 100px; /* Tentukan tinggi thumbnail */
    margin-top: 1rem;
    overflow: hidden;
}

.gallery-thumbs .swiper-slide {
    width: auto;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.gallery-thumbs .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 5px;
    border: 3px solid transparent; /* Default tanpa border */
    border-radius: 5px;
    transition: border 0.3s ease; /* Transisi untuk efek halus */
}

.gallery-thumbs .swiper-slide-thumb-active img {
    border-color: blue; /* Warna border untuk gambar aktif */
}



            </style>
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    @foreach($product->images as $image)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
                
                <!-- Tombol Navigasi -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            
            <!-- Thumbnail Images -->
            <div class="swiper-container gallery-thumbs mt-4">
                <div class="swiper-wrapper">
                    @foreach($product->images as $image)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->name }}" >
                        </div>
                    @endforeach
                </div>
            </div>
            
            
        </div>
        <script>
           var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
});

var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    slidesPerView: 1,  // Pastikan hanya 1 gambar terlihat pada satu waktu
    loop: true,  // Opsi untuk looping galeri
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: galleryThumbs
    }
});

        </script>
                
        <div class="lg:w-1/2 sm:w-full grid content-between">
            <div class="h-auto">
                <h1 class=" text-3xl font-bold border-b border-black ">{{ $product->name }}</h1>
                <h2 class=" text-2xl py-5 ">Rp.{{ $product->price }}</h2>
                <div class="flex items-center">
                    @if($averageRating > 0)
                        <span >({{ number_format($averageRating, 1) }} <i class=" fa fa-star text-yellow-400"></i>)</span>
                    @else
                        <span class=" text-gray-500">Belum ada review</span>
                    @endif
                </div>
                                
                <h3 class=" underline-offset-4 underline">Detail</h3>
                <p>Stok : {{ $product->stock ?? 'N/A' }}</p>
                <a href="http://"><p class="">Kategori : {{ $product->category->name ?? 'N/A' }}</p> </a>
                <p>Deskripsi : </p>
                <p class=" text-wrap">{{ $product->description }}</p>
            </div>
            <div class="flex gap-5 h-auto">
              <a href="http://" class="w-1/2">
                <button class=" fa fa-shopping-cart w-full h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md"> Add to Cart</button>
              </a>  
              <!-- Di halaman produk -->
                <a href="{{ route('order.form', ['product' => $product->id]) }}" class="btn-order w-1/2">
                <button class=" fa fa-whatsapp w-full  h-14 transition duration-150 ease-in-out hover:scale-110 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-md "> Order</button>
               </a>
            </div>
        </div>
      </div>
      <div class="mt-20 border-t pt-10 border-black">
        <h2 class="text-2xl font-bold">Ulasan</h2>
    
        @auth
            <form class=" mt-5" action="{{ route('comments.store', $product) }}" method="POST">
                @csrf
                <div class="flex items-center space-x-1 rating" id="rating-stars">
                    @for ($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" 
                            {{ $product->rating == $i ? 'checked' : '' }} class="hidden" />
                        <label for="star{{ $i }}" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $i <= $product->rating ? '#f59e0b' : 'none' }}" 
                                 viewBox="0 0 24 24" stroke="{{ $i <= $product->rating ? '#f59e0b' : '#d1d5db' }}" 
                                 class="w-6 h-6 star" data-value="{{ $i }}">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.713 5.267a1 1 0 00.95.69h5.516c.967 0 1.371 1.24.588 1.81l-4.473 3.248a1 1 0 00-.364 1.118l1.713 5.267c.3.922-.755 1.688-1.54 1.118l-4.473-3.248a1 1 0 00-1.176 0l-4.473 3.248c-.784.57-1.84-.196-1.54-1.118l1.713-5.267a1 1 0 00-.364-1.118L2.17 10.694c-.783-.57-.38-1.81.588-1.81h5.516a1 1 0 00.95-.69l1.713-5.267z" />
                            </svg>
                        </label>
                    @endfor
                </div>
                
                <script>
                    const stars = document.querySelectorAll('#rating-stars .star');
                    const inputs = document.querySelectorAll('#rating-stars input');
                
                    stars.forEach((star) => {
                        star.addEventListener('click', function() {
                            const ratingValue = this.getAttribute('data-value');
                            
                            // Update radio button selection
                            inputs.forEach((input) => {
                                if (input.value == ratingValue) {
                                    input.checked = true;
                                }
                            });
                
                            // Update star color
                            stars.forEach((star) => {
                                if (star.getAttribute('data-value') <= ratingValue) {
                                    star.setAttribute('fill', '#f59e0b');
                                    star.setAttribute('stroke', '#f59e0b');
                                } else {
                                    star.setAttribute('fill', 'none');
                                    star.setAttribute('stroke', '#d1d5db');
                                }
                            });
                        });
                    });
                </script>
                <textarea name="comment" class="w-full h-24 p-2 border border-gray-400 rounded-md"></textarea>                  
                <button type="submit" class=" mb-8 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md">Tambahkan Ulasan</button>
            </form>
            @else
    <p>Anda Perlu <a href="{{ route('login') }}" class=" hover:underline">Login</a> atau <a href="{{ route('registrasi') }}" class=" hover:underline">Register</a> untuk menambahkan Ulasan</p>
        @endauth
        <div class="comment-count mt-4">
            {{ $comments->count() }} {{ Str::plural('Ulasan', $comments->count()) }}
        </div>
        @foreach ($comments as $comment)
            <!-- Display each comment -->
            <div class="grid bg-gray-50 border-b py-10 px-6 border-black items-center w-full text-sm text-gray-900 dark:text-white">
                <div class="flex mb-2">
                <img class="mr-4 w-12 h-12 rounded-full" src="{{ asset('user.png') }}" alt="{{ $comment->user->name }}">
                <div class="content-start">
                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $comment->user->name }}</p>
                    <p class="text-gray-600">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                </div>
                <div>
                    <div class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5
                                {{ $i <= $comment->rating ? 'text-yellow-400' : 'text-gray-400' }}" 
                                fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.27 5.82 21 7 14.14l-5-4.87 6.91-1.01L12 2z" />
                            </svg>
                        @endfor
                    </div>                    
                    <p class="text-base text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
