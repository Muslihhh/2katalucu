<x-layout :categories="$categories" :products="$products" :daerah="$daerah">

    {{-- <x-navbar :homeRoute="route('home')" :categories="$categories" :products="$products" :daerah="$daerah" /> --}}

    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slider></x-slider>

    <section>

        {{-- @if (isset($categories) && count($categories) > 0)
          <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
              <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
                  <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Kategori</h2>
              </div>
              <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                  @foreach ($categories as $category)
                      <a href="{{ route('home.filter', $category->id) }}" 
                         class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 
                         {{ isset($selectedCategory) && $selectedCategory->id == $category->id ? 'bg-gray-200' : '' }}">
                          <i class="fas fa-tag mr-2"></i>
                          <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $category->name }}</span>
                      </a>
                  @endforeach
              </div>
          </div>
      @else
          <p>Tidak ada kategori tersedia.</p>
      @endif --}}

        @if (isset($products) && count($products) > 0)
            <div class="bg-gray-50 justify-center">
                {{-- <div class=" max-w-full px-2 py-6 sm:px-6 sm:py-6 lg:max-w-7xl lg:px-6">
                 <h2 class="text-2xl font-bold mb-6">Produk Terbaru</h2>
                  <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                      @foreach ($latestProducts as $product)
                          <a href="{{ route('products.show', $product->id) }}" class="group relative block hover:border-2 hover:border-blue-500  overflow-hidden shadow-md">
                              <button class="absolute end-4 hover:scale-105 top-4 z-10 rounded-full bg-white p-1.5 text-gray-900 transition hover:text-gray-900/75">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                  </svg>
                              </button>
                              @if ($product->images->isNotEmpty())
                              <div class="product-thumbnail">
                                  <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                      alt="{{ $product->name }}" class="h-64 w-full object-cover transition duration-500 hover:scale-125 sm:h-72">
                                    </div>
                                @else
                                    <p>No image available</p>
                                @endif     
                              <div class="relative border border-gray-100 bg-white p-6">
                                @if ($product->created_at >= now()->subDays(7))
                                <span class="whitespace-nowrap bg-yellow-300 px-3 py-1.5 text-xs font-medium"> New </span>
                                @endif
                                  <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                                  <p class="mt-1.5 text-sm text-gray-700">${{ number_format($product->price, 2) }}</p>
                                  <form class="mt-4">
                                      <button class="block w-full rounded bg-blue-500 p-4 text-sm font-medium transition hover:scale-105">
                                          Add to Cart
                                      </button>
                                  </form>
                              </div>
                          </a>
                      @endforeach
                  </div>
              </div> --}}
                <div class=" max-w-full px-2 py-6 sm:px-6 sm:py-6 lg:max-w-full lg:px-6">
                    <h2 class="text-4xl font-bold mb-6 text-purple-900">Untuk Anda</h2>
                    <!-- Filter Form -->
                    <form class=" mb-5" action="{{ route('home') }}" method="GET">
                        <label for="sort">Urutkan Dengan :</label>
                        <select class=" p-1" name="sort" id="sort" onchange="this.form.submit()">
                            <option value="">Default</option>
                            <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>A-Z</option>
                            <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Z-A</option>
                            <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru
                            </option>
                            <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama
                            </option>
                        </select>
                    </form>

                    <div
                        class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-5 xl:gap-x-8">

                        @foreach ($products as $product)
                            <a href="{{ route('products.show', $product->id) }}"
                                class="group relative block hover:border-2 hover:border-blue-500 overflow-hidden shadow-md">
                                @if ($product->created_at >= now()->subDays(1))
                                        <span class="whitespace-nowrap bg-yellow-300 px-3 py-2 text-xs font-medium z-10 absolute">
                                            Baru </span>
                                @endif
                                    
                                @if ($product->images->isNotEmpty())
                                    <div class="product-thumbnail">
                                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                            alt="{{ $product->name }}"
                                            class="h-64 w-full object-cover transition duration-500 hover:scale-125 sm:h-72">
                                    </div>
                                @else
                                    <p>Gambar tidak tersedia</p>
                                @endif
                                <div class="relative bg-white px-4 pb-4">
                                    
                                    <h3 class=" text-xl font-medium text-gray-900">{{ $product->name }}</h3>
                                    @if ($product->discount > 0)
                                    <div class="flex gap-1">
                                        <p class="original-price text-gray-500 line-through">
                                            Rp.{{ number_format($product->price, 2) }}
                                        </p>
                                        <p class="discount-percentage text-red-500">
                                           -{{ $product->discount_percentage }}
                                        </p>
                                    </div>
                                        
                                        <p class="discounted-price text-blue-700">
                                            Rp.{{ number_format($product->final_price, 2) }}
                                        </p>
                                    @else
                                        <p class="price">Rp.{{ number_format($product->price, 2) }}</p>
                                    @endif
                                    @php
                                        $averageRating = $product->comments->avg('rating') ?? 0; // Hitung rata-rata rating dari komentar
                                    @endphp

                                    <!-- Tampilkan rating rata-rata -->
                                    @if ($averageRating > 0)
                                        <span>({{ number_format($averageRating, 1) }} <i
                                                class=" fa fa-star text-yellow-400"></i>)</span>
                                    @else
                                        <span class=" text-gray-500">Belum ada review</span>
                                    @endif
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button
                                            class="block w-full rounded bg-blue-500 p-4 text-sm font-medium transition hover:scale-105">
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            
        @else 
        <div class=" w-full flex justify-center items-center">
            <p class=" text-3xl">Tidak ada produk</p>
        </div>  
        @endif
        <a href="{{ route('cart.show') }}">
            <div class=" fixed bottom-10 right-2 transform bg-blue-500 text-white py-2 px-4 rounded-lg shadow-lg z-50">
                <img src="{{ asset('cart.png') }}" alt="Cart Icon" class="w-8 h-8">
                @if($cartCount > 0)
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold text-red-100 bg-red-600 rounded-full">
                        {{ $cartCount }}
                    </span>
                @endif
            </div>
        </a>
        
    </section>
    
</x-layout>
