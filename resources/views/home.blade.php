<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  
  <x-slider></x-slider>
  <x-categori></x-categori>
  <div class="bg-white">
      <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
          <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
              @foreach ($products as $product)
                  <a href="{{ route('products.show', $product->id) }}" class="group relative block overflow-hidden shadow-md">
                      <button class="absolute end-4 hover:scale-105 top-4 z-10 rounded-full bg-white p-1.5 text-gray-900 transition hover:text-gray-900/75">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                          </svg>
                      </button>
                      <img src="{{ asset('storage/images' . $product->image) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover transition duration-500 hover:scale-125 sm:h-72">
                      <div class="relative border border-gray-100 bg-white p-6">
                          <span class="whitespace-nowrap bg-yellow-300 px-3 py-1.5 text-xs font-medium"> New </span>
                          <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                          <p class="mt-1.5 text-sm text-gray-700">${{ $product->price }}</p>
                          <form class="mt-4">
                              <button class="block w-full rounded bg-blue-500 p-4 text-sm font-medium transition hover:scale-105">
                                  Add to Cart
                              </button>
                          </form>
                      </div>
                  </a>
              @endforeach
          </div>
      </div>
  </div>
</x-layout>
