<!-- Start block -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<section class="bg-gray-50 dark:bg-gray-900 h-full p-3 sm:p-5 antialiased">
    <div class="mx-auto max-w-screen-2xl h-full px-4 lg:px-12">
        <div class="bg-white h-full dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div
                class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="flex-1 flex items-center space-x-2">
                    <h5>
                        <span class="text-gray-500">Hi, Admin!</span>
                        <span class="dark:text-white"></span>
                    </h5>
                </div>

            </div>
            <div
                class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center action="{{ route('admin') }}" method="GET"">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                </svg>
                            </div>
                            <input value="{{ request('search') }}" type="search" id="search" name="search"
                                placeholder="Search for products" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <button type="submit"
                            class=" hover hover:bg-blue-800 bg-blue-700 p-2 rounded-r-lg text-white">Search</button>
                    </form>
                </div>
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <button type="button" data-drawer-target="createProductModal" data-drawer-show="createProductModal"
                        aria-controls="createProductModal"
                        class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-2 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Tambah Produk
                    </button>
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
                        id="createProductModal"
                        class="fixed top-0 left-0 z-40 w-full h-screen max-w-3xl p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
                        tabindex="-1" aria-labelledby="createProductModal-label" aria-hidden="true">
                        @csrf
                        <h5 id="drawer-label"
                            class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                            New
                            Product</h5>
                        <button type="button" data-drawer-dismiss="createProductModal"
                            aria-controls="createProductModal"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Close menu</span>
                        </button>
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6 ">
                            <div class="space-y-4 sm:col-span-2 sm:space-y-6">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                        Name</label>
                                    <input type="text" name="name" id="name" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="" placeholder="Type product name" required="">
                                </div>
                                <div>
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <div
                                        class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                        <div class="px-4 py-3 bg-white rounded-b-lg dark:bg-gray-800">
                                            <textarea name="description" id="description" required rows="8"
                                                class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                                placeholder="Write product description here" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                        Images</span>
                                    {{-- <div id="imagePreviewContainer"
                                        style="display: flex; flex-wrap: wrap; margin-top: 10px;">
                                        <!-- Gambar yang ditambahkan akan ditampilkan di sini -->
                                    </div> --}}
                                    {{-- </div> --}}
                                    <div class=" grid items-center justify-start w-full">
                                        <label for="images">Upload Images:</label>
                                        <input type="file" name="images[]" id="images" multiple accept="image/*">
                                    </div>
                                </div>

                                {{-- <script>
                                    function previewImages(event) {
                                        const fileInput = event.target;
                                        const outputContainer = document.getElementById('imagePreviewContainer');

                                        // Jika tidak ada file yang dipilih, keluar dari fungsi
                                        if (!fileInput.files.length) {
                                            return;
                                        }

                                        // Loop melalui semua file yang dipilih
                                        for (let i = 0; i < fileInput.files.length; i++) {
                                            const file = fileInput.files[i];

                                            // Cek apakah gambar sudah ditambahkan sebelumnya
                                            const isAlreadyAdded = Array.from(outputContainer.children).some((child) => {
                                                return child.getAttribute('data-file-name') === file.name;
                                            });

                                            // Jika sudah ditambahkan, lewati iterasi ini
                                            if (isAlreadyAdded) {
                                                continue;
                                            }

                                            // Buat elemen img baru untuk setiap gambar
                                            const imgWrapper = document.createElement('div');
                                            imgWrapper.style.position = 'relative';
                                            imgWrapper.style.marginRight = '10px';
                                            imgWrapper.setAttribute('data-file-name', file.name); // Simpan nama file untuk identifikasi

                                            const reader = new FileReader();

                                            reader.onload = function(event) {
                                                const img = document.createElement('img');
                                                img.src = event.target.result;
                                                img.style.width = '100px'; // Set ukuran sesuai keinginan
                                                img.style.height = '100px';
                                                imgWrapper.appendChild(img);

                                                // Tambahkan tombol delete per gambar
                                                const deleteButton = document.createElement('button');
                                                deleteButton.innerHTML = ``;
                                                <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                           
                                                deleteButton.style.position = 'absolute';
                                                deleteButton.style.top = '0';
                                                deleteButton.style.right = '0';
                                                deleteButton.style.backgroundColor = 'transparent';
                                                deleteButton.style.border = 'none';
                                                deleteButton.style.cursor = 'pointer';

                                                deleteButton.addEventListener('click', function() {
                                                    imgWrapper.remove(); // Hapus gambar
                                                    if (outputContainer.children.length === 0) {
                                                        fileInput.value = ''; // Reset file input jika semua gambar dihapus
                                                    }
                                                });

                                                imgWrapper.appendChild(deleteButton);
                                                outputContainer.appendChild(imgWrapper);
                                            };

                                            reader.readAsDataURL(file);
                                        }
                                    }

                                    // Event listener pada input file (cukup sekali)
                                    document.getElementById('images').addEventListener('change', previewImages);
                                </script> --}}








                                {{-- <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input datepicker="" id="datepicker" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 datepicker-input" value="" placeholder="Select date">
                                    </div> --}}
                            </div>
                            <div class="space-y-4 sm:space-y-6">
                                <div>
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                    <input type="number" name="price" id="price" step="0.01" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="" placeholder="Product price" required="">
                                </div>
                                <div>
                                    <label for="discount"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">discount</label>
                                    <input type="number" name="discount" id="discount" step="0.01" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="" placeholder="Product discount" required="">
                                </div>
                                <div><label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select name="category_id" id="category_id" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        @if ($categories->isEmpty())
                                            <option value="">No categories available</option>
                                        @else
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div><label for="daerah"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dearah</label>
                                    <select name="daerah_id" id="daerah_id" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        @if ($daerah->isEmpty())
                                            <option value="">No daerah available</option>
                                        @else
                                            @foreach ($daerah as $d)
                                                <option value="{{ $d->id }}">{{ $d->nama_daerah }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-6 sm:w-1/2">
                            <button type="submit"
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Tambah Produk 
                            </button>

                        </div>
                    </form>
                    <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                            class="h-4 w-4 mr-1.5 -ml-1 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                clip-rule="evenodd" />
                        </svg>
                        Filter options
                        <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <div id="filterDropdown"
                        class="z-10 hidden px-3 pt-1 bg-white rounded-lg shadow w-80 dark:bg-gray-700 right-0">
                        <div class="flex items-center justify-between pt-2">
                            <h6 class="text-sm font-medium text-black dark:text-white">Filters</h6>
                            <div class="flex items-center space-x-3">
                                <a href="#"
                                    class="flex items-center text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">Save
                                    view</a>
                                <a href="#"
                                    class="flex items-center text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">Clear
                                    all</a>
                            </div>
                        </div>
                      
                        @props(['categories' => [], 'products' => []])

                        <!-- Category Section -->
                        <div>
                            <div id="accordion-flush-category" data-accordion="collapse"
                                data-active-classes="text-black dark:text-white"
                                data-inactive-classes="text-gray-500 dark:text-gray-400">
                                <h2 id="category-heading">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
                                        data-accordion-target="#category-body" aria-expanded="false"
                                        aria-controls="category-body">
                                        <span>Category</span>
                                        <svg aria-hidden="true" class="w-5 h-5 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="category-body" class="hidden" aria-labelledby="category-heading">
                                    <div class="py-2 font-light border-b border-gray-200 dark:border-gray-600">
                                        <ul class="space-y-2">
                                            @foreach ($categories as $category)
                                            <li class="flex items-center">
                                                <input id="category_{{ $category->id }}" type="checkbox" value="{{ $category->id }}"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="category_{{ $category->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    <a href="{{ route('home.filter', $category->id) }}" class="hover:underline">{{ $category->name }}</a>
                                                    ({{ $category->products->count() }})
                                                </label>
                                            </li>
                                            @endforeach
                                            <li>
                                                <a href="{{ route('admin') }}" class="flex items-center text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                                    View all
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Price Section -->
                        <div>
                            <div id="accordion-flush-price" data-accordion="collapse"
                                data-active-classes="text-black dark:text-white"
                                data-inactive-classes="text-gray-500 dark:text-gray-400">
                                <h2 id="price-heading">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
                                        data-accordion-target="#price-body" aria-expanded="false"
                                        aria-controls="price-body">
                                        <span>Price</span>
                                        <svg aria-hidden="true" class="w-5 h-5 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="price-body" class="hidden" aria-labelledby="price-heading">
                                    <div class="flex items-center py-2 space-x-3 font-light border-b border-gray-200 dark:border-gray-600">
                                        <select id="price-from"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option disabled selected>From</option>
                                            @foreach ($products as $product)
                                            <option>{{ $product->price }}</option>
                                            @endforeach
                                        </select>
                                        <select id="price-to"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option disabled selected>To</option>
                                            @foreach ($products as $product)
                                            <option>{{ $product->price }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Daerah Section -->
                        <div>
                            <div id="accordion-flush-daerah" data-accordion="collapse"
                                data-active-classes="text-black dark:text-white"
                                data-inactive-classes="text-gray-500 dark:text-gray-400">
                                <h2 id="daerah-heading">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
                                        data-accordion-target="#daerah-body" aria-expanded="false"
                                        aria-controls="daerah-body">
                                        <span>Daerah</span>
                                        <svg aria-hidden="true" class="w-5 h-5 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="daerah-body" class="hidden" aria-labelledby="daerah-heading">
                                    <div class="py-2 font-light border-b border-gray-200 dark:border-gray-600">
                                        <ul class="space-y-2">
                                            @foreach ($categories as $category)
                                            <li class="flex items-center">
                                                <input id="daerah_{{ $category->id }}" type="checkbox" value="{{ $category->id }}"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="daerah_{{ $category->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    <a href="{{ route('home.filter', $category->id) }}" class="hover:underline">{{ $category->daerah }}</a>
                                                    ({{ $category->products->count() }})
                                                </label>
                                            </li>
                                            @endforeach
                                            <li>
                                                <a href="{{ route('admin') }}" class="flex items-center text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                                    View all
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        {{-- </div> --}}
                        
                            <!-- Rating -->
                            <h2 id="rating-heading">
                                <button type="button"
                                    class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
                                    data-accordion-target="#rating-body" aria-expanded="true"
                                    aria-controls="rating-body">
                                    <span>Rating</span>
                                    <svg aria-hidden="true" data-accordion-icon=""
                                        class="w-5 h-5 rotate-180 shrink-0" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="rating-body" class="hidden" aria-labelledby="rating-heading">
                                <div class="py-2 space-y-2 font-light border-b border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center">
                                        <input id="five-stars" type="radio" value="" name="rating"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="five-stars" class="flex items-center ml-2">
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Second star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Third star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Fourth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Fifth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="four-stars" type="radio" value="" name="rating"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="four-stars" class="flex items-center ml-2">
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Second star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Third star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Fourth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Fifth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="three-stars" type="radio" value="" name="rating"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="three-stars" class="flex items-center ml-2">
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Second star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Third star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Fourth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Fifth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="two-stars" type="radio" value="" name="rating"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="two-stars" class="flex items-center ml-2">
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Second star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Third star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Fourth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Fifth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="one-star" type="radio" value="" name="rating"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="one-star" class="flex items-center ml-2">
                                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Second star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Third star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Fourth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor" viewbox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <title>Fifth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 w-full md:w-auto">
                        <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                            class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                            type="button">
                            Actions
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <div id="actionsDropdown"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="actionsDropdownButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
                                        Edit</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                    all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <form id="bulkDeleteForm" method="POST" action="{{ route('products.bulkDelete') }}">
                    @csrf
                    @method('DELETE')
                    <button id="deleteButton" type="submit" class="mt-4 px-4 py-2 bg-red-500 text-white rounded" 
            onclick="return confirm('Apakah Anda yakin ingin menghapus produk yang dipilih?')" style="display: none;">
        Hapus Produk Terpilih
    </button>
</form>
<script>
    <script>
function toggleAllCheckboxes(source) {
    const checkboxes = document.querySelectorAll('input[name="selected_products[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = source.checked;
    });

    // Panggil fungsi untuk menampilkan atau menyembunyikan tombol hapus
    toggleDeleteButton();
}

function toggleDeleteButton() {
    const checkboxes = document.querySelectorAll('input[name="selected_products[]"]:checked');
    const deleteButton = document.getElementById('deleteButton');
    deleteButton.style.display = checkboxes.length > 0 ? 'inline-block' : 'none';
}

// Jika ingin memanfaatkan tombol hapus dengan validasi sebelum penghapusan
document.getElementById('bulkDeleteForm').addEventListener('submit', function(event) {
    const selectedCheckboxes = document.querySelectorAll('input[name="selected_products[]"]:checked');

    if (selectedCheckboxes.length === 0) {
        event.preventDefault(); // Cegah pengiriman jika tidak ada yang dipilih
        alert('Silakan pilih produk yang ingin dihapus.');
    } else {
        const confirmDelete = confirm('Apakah Anda yakin ingin menghapus produk yang dipilih?');
        if (!confirmDelete) {
            event.preventDefault(); // Cegah pengiriman jika pengguna batal
        }
    }
});
</script>

</script>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all" type="checkbox"
                                        class="w-4 h-4 text-primary-600 bg-gray-00 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                                <script>
                                    // Memilih semua checkbox ketika checkbox header diklik
                                    document.getElementById('checkbox-all').addEventListener('click', function () {
                                        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                        checkboxes.forEach((checkbox) => {
                                            if (checkbox !== this) {
                                                checkbox.checked = this.checked;
                                            }
                                        });
                                    });
                                </script>
                                
                            </th>
                            <th scope="col" class="p-4">Product</th>
                            <th scope="col" class="p-4">Category</th>
                            <th scope="col" class="p-4">Daerah</th>
                            <th scope="col" class="p-4">Harga</th>
                            <th scope="col" class="p-4">Rating</th>
                            <th scope="col" class="p-4 text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="p-4 w-4">
                                    <div class="flex items-center">
                                        <input name="selected_products[]" value="{{ $product->id }}" type="checkbox"
                                               class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-{{ $product->id }}" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="items-center flex gap-5 mr-3">
                                        @if ($product->images->isNotEmpty())
                                            <div class="product-thumbnail">
                                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                                    alt="{{ $product->name }}" style="width: 40px; height: 40px;">
                                            </div>
                                        @else
                                            <p>No image available</p>
                                        @endif
                                       <h1> {{ $product->name }}</h1>
                                    </div>
                                </th>
                                <td class="px-4 py-3">
                                    <span
                                        class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ $product->category->name ?? 'N/A' }}</span>
                                </td>
                                
                                <td class="px-4 py-3">
                                    <span
                                        class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ $product->daerah->nama_daerah ?? 'N/A' }}</span>
                                </td>

                                <td class="px-4 py-3">
                                    <span
                                        class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{ $product->price }}</span>
                                </td>


                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center">
                                        <span class="ml-1">({{ number_format($product->averageRating, 1) }} <i class=" fa fa-star text-yellow-400"></i>)</span>
                                    </div>
                                </td>
                                <td
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white justify-center">
                                    <div class="flex items-center justify-center space-x-4">
                                        <button type="button"
                                            onclick="openDrawer('{{ route('products.apdet', $product->id) }}', 'drawer-update-product-{{ $product->id }}')"
                                            class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-2 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Edit
                                        </button>



                                        <!-- edit -->

                                        <form id="drawer-update-product-{{ $product->id }}"
                                            action="{{ route('products.apdet', ['id' => $product->id]) }}"
                                            method="POST"
                                            enctype="multipart/form-data"
                                            class="fixed top-0 left-0 z-40 w-full h-screen max-w-3xl p-4 overflow-y-auto bg-white dark:bg-gray-800 transform -translate-x-full transition-transform"
                                            tabindex="-1" aria-labelledby="drawer-update-product-label"
                                            aria-hidden="true">
                                            @csrf
                                            @method('PUT')
                                            <h5 id="drawer-label"
                                                class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                                                New Product</h5>
                                            <button type="button" onclick="closeDrawer(this.closest('.fixed'))"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span class="sr-only">Close menu</span>
                                            </button>
                                            <div class="grid gap-4 sm:grid-cols-3 sm:gap-6 ">
                                                <div class="space-y-4 sm:col-span-2 sm:space-y-6">
                                                    <div>
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                                            Name</label>
                                                        <input type="text" name="name" id="name" required
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ $product->name }}"
                                                            placeholder="Type product name" required="">
                                                    </div>
                                                    <div>
                                                        <label for="description"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                        <div
                                                            class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                                            <div
                                                                class="px-4 py-3 bg-white rounded-b-lg dark:bg-gray-800">
                                                                <textarea name="description" id="description" required rows="8"
                                                                    class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                                                    placeholder="Write product description here" required="">{{ $product->description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Tampilkan Gambar Produk Saat Ini -->
                                                    <div class="mb-4">
                                                        <label class="block text-sm font-medium text-gray-900">Current Images:</label>
                                                        <div id="currentImagesContainer" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                                            @foreach($product->images as $image)
                                                                <div class="relative" data-image-id="{{ $image->id }}">
                                                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover rounded">
                                                                    <button type="button" onclick="removeImage({{ $image->id }})"
                                                                        class="absolute top-0 right-0 bg-red-500 text-white py-1 px-2 rounded-full">X</button>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        function removeImage(imageId) {
                                                            fetch(`/products/images/${imageId}`, {
                                                                method: 'DELETE',
                                                                headers: {
                                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                }
                                                            })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (data.success) {
                                                                    // Hapus elemen gambar dari halaman
                                                                    const imageElement = document.querySelector(`[data-image-id="${imageId}"]`);
                                                                    if (imageElement) {
                                                                        imageElement.remove();
                                                                    }
                                                                }
                                                            })
                                                            .catch(error => console.error('Error:', error));
                                                        }
                                                    </script>
                                                    
                                                    <!-- Input untuk Mengunggah Gambar Baru -->
                                                    <div class="mb-4">
                                                        <label for="images">Upload Images:</label>
                                                        <input type="file" name="images[]" id="images" multiple accept="image/*">
                                                    </div>



                                                    {{-- <div class="relative">
                                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                                        </svg>
                                                                    </div>
                                                                    <input datepicker="" id="datepicker" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 datepicker-input" value="" placeholder="Select date">
                                                                </div> --}}
                                                </div>
                                                <div class="space-y-4 sm:space-y-6">
                                                    <div>
                                                        <label for="price"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                                        <input type="number" name="price" id="price"
                                                            step="0.01" required
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ $product->price }}" placeholder="Product price"
                                                            required="">
                                                    </div>
                                                    <div>
                                                        <label for="discount"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">discount</label>
                                                        <input type="number" name="discount" id="discount"
                                                            step="0.01" required
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ $product->discount }}" placeholder="Product discount"
                                                            required="">
                                                    </div>
                                                    <div><label for="category"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                        <select name="category_id" id="category_id" required
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            @if ($categories->isEmpty())
                                                                <option value="">No categories available
                                                                </option>
                                                            @else
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                                        {{ $category->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div><label for="daerah"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Daerah</label>
                                                        <select name="daerah_id" id="daerah_id" required
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            @if ($daerah->isEmpty())
                                                                <option value="">No daerah available
                                                                </option>
                                                            @else
                                                                @foreach ($daerah as $d)
                                                                    <option value="{{ $d->id }}"
                                                                        {{ $product->daerah_id == $d->id ? 'selected' : '' }}>
                                                                        {{ $d->nama_daerah }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4 mt-6 sm:w-1/2">
                                                <button type="submit"
                                                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Simpan
                                                </button>

                                            </div>
                                        </form>

                                        <script>
                                            function openDrawer(url, formId) {
                                                const form = document.getElementById(formId);
                                                // Remove class that hides the form
                                                form.classList.remove('-translate-x-full');
                                                form.action = url;
                                            }

                                            function closeDrawer(form) {
                                                // Add class to hide the form
                                                form.classList.add('-translate-x-full');
                                            }
                                        </script>
                                        {{-- <button type="button" data-drawer-target="drawer-read-product-advanced"
                                            aria-controls="drawer-read-product-advanced"
                                            class="py-2 px-3 flex items-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-600 bg-white rounded-lg border border-gray-200 hover:bg-gray-100"
                                            data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                            data-description="{{ $product->description }}"
                                            data-image="{{ asset('storage/' . $product->image) }}"
                                            onclick="openPreview(this)">
                                            Preview
                                        </button>
                                        <!-- Preview -->
                                        <div id="drawer-read-product-advanced"
                                            class="overflow-y-auto fixed top-0 left-0 z-40 p-4 w-full max-w-lg h-screen bg-white transition-transform -translate-x-full dark:bg-gray-800"
                                            tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                                            <div class=" mt-10">
                                                <h4 id="read-drawer-label"
                                                    class="mb-1.5 leading-none text-xl font-semibold text-gray-900 dark:text-white">
                                                </h4>
                                                <h5
                                                    class="drawer-product-price mb-5 text-xl font-bold text-gray-900 dark:text-white">
                                                </h5>
                                            </div>
                                            <button type="button" onclick="closePreviewDrawer()"
                                                aria-controls="drawer-read-product-advanced"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span class="sr-only">Close menu</span>
                                            </button>

                                            <div class="p-2 bg-gray-100 rounded-lg dark:bg-gray-700 h-56 w-56 mb-5">
                                                <img class="drawer-product-image" src="" alt="Product Image">
                                            </div>

                                            <dl class="sm:mb-5">
                                                <dt
                                                    class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                    Deskripsi</dt>
                                                <dd
                                                    class="drawer-product-description mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                </dd>
                                            </dl>
                                        </div>

                                        <script>
                                            function openPreview(button) {
                                                const name = button.getAttribute('data-name');
                                                const price = button.getAttribute('data-price');
                                                const description = button.getAttribute('data-description');
                                                const image = button.getAttribute('data-image');

                                                document.getElementById('read-drawer-label').innerText = name;
                                                document.querySelector('.drawer-product-price').innerText = 'Rp ' + price;
                                                document.querySelector('.drawer-product-description').innerText = description;
                                                document.querySelector('.drawer-product-image').setAttribute('src', image);

                                                // Tampilkan drawer
                                                const drawer = document.getElementById('drawer-read-product-advanced');
                                                drawer.classList.remove('-translate-x-full');
                                                drawer.classList.add('translate-x-0');
                                            }

                                            function closePreviewDrawer() {
                                                const drawer = document.getElementById('drawer-read-product-advanced');
                                                drawer.classList.add('-translate-x-full');
                                                drawer.classList.remove('translate-x-0'); // Pastikan class ini dihapus
                                            }
                                        </script> --}}
                                        <button type="button"
                                            onclick="setDeleteAction('{{ route('products.destroy', $product->id) }}', '{{ $product->name }}')"
                                            data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                            class=" btn btn-danger flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Delete
                                        </button>
                                        <div id="delete-modal" tabindex="-1"
                                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full h-auto max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-toggle="delete-modal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="p-6 text-center">
                                                        <svg aria-hidden="true"
                                                            class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                            fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <!-- Di modal delete -->
                                                        <p>Apakah Anda yakin ingin menghapus produk <br>
                                                            <strong id="product-name"></strong>?
                                                        </p>
                                                        <form id="delete-form" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes,
                                                                I'm sure</button>
                                                            <button type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                                                data-modal-toggle="delete-modal">No,
                                                                cancel</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function setDeleteAction(action, name) {
                                                document.getElementById('delete-form').action = action;
                                                document.getElementById('product-name').innerText = name;
                                            }
                                        </script>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{ $products->links() }}
            </div>
            <nav class="flex flex-col md:flex-row items-start md:items-center space-y-3 md:space-y-0 p-4"
                aria-label="Table navigation">
                <a href="/home"><button class=" p-2 bg-blue-600 text-white rounded-lg">Home</button></a>
            </nav>
        </div>
    </div>
</section>
<!-- End block -->