<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="container mx-auto my-10">
      <h1 class="text-4xl font-bold mb-6">{{ $title }}</h1>
  
      <div class="bg-white p-6 rounded-md shadow-lg">
        @if(count($cart) > 0)
          <h2 class="text-2xl font-semibold mb-4">Ringkasan Pesanan</h2>
          <ul class="mb-6">
            @foreach($cart as $item)
              <li class="flex justify-between py-2 border-b">
                <div>
                  <p class="text-lg font-medium">{{ $item['name'] }}</p>
                  <p class="text-sm text-gray-500">Jumlah: {{ $item['quantity'] }} x ${{ $item['price'] }}</p>
                </div>
                <p class="text-lg font-medium">${{ $item['quantity'] * $item['price'] }}</p>
              </li>
            @endforeach
          </ul>
  
          <!-- Form untuk memproses checkout -->
          <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
  
            <!-- Alamat Pengiriman -->
            <div class="mb-6">
              <h3 class="text-xl font-semibold mb-2">Alamat Pengiriman</h3>
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label for="recipient_name" class="block text-sm font-medium text-gray-700">Nama Penerima:</label>
                  <input type="text" name="recipient_name" id="recipient_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                  <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon:</label>
                  <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                  <label for="address" class="block text-sm font-medium text-gray-700">Alamat:</label>
                  <input type="text" name="address" id="address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                  <label for="postal_code" class="block text-sm font-medium text-gray-700">Kode Pos:</label>
                  <input type="text" name="postal_code" id="postal_code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                  <label for="city" class="block text-sm font-medium text-gray-700">Kota:</label>
                  <input type="text" name="city" id="city" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                  <label for="province" class="block text-sm font-medium text-gray-700">Provinsi:</label>
                  <input type="text" name="province" id="province" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
              </div>
            </div>
  
            <!-- Ekspedisi -->
            <div class="mb-6">
              <h3 class="text-xl font-semibold mb-2">Pilih Ekspedisi</h3>
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <input type="radio" name="shipping_method" id="jne" value="JNE" class="mr-2" required>
                  <label for="jne" class="text-sm font-medium">JNE (3-5 Hari)</label>
                </div>
                <div>
                  <input type="radio" name="shipping_method" id="jnt" value="JNT" class="mr-2" required>
                  <label for="jnt" class="text-sm font-medium">JNT (3-5 Hari)</label>
                </div>
                <div>
                  <input type="radio" name="shipping_method" id="tiki" value="TIKI" class="mr-2" required>
                  <label for="tiki" class="text-sm font-medium">TIKI (2-4 Hari)</label>
                </div>
                <div>
                  <input type="radio" name="shipping_method" id="pos" value="POS" class="mr-2" required>
                  <label for="pos" class="text-sm font-medium">POS Indonesia (4-6 Hari)</label>
                </div>
                <div>
                  <input type="radio" name="shipping_method" id="grab" value="Grab" class="mr-2" required>
                  <label for="grab" class="text-sm font-medium">Grab Instant (1 Hari)</label>
                </div>
              </div>
            </div>
  
            <!-- Metode Pembayaran -->
            <div class="mb-6">
              <h3 class="text-xl font-semibold mb-2">Metode Pembayaran</h3>
              <select name="payment_method" id="payment_method" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                <option value="credit_card">Kartu Kredit</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Transfer Bank</option>
                <option value="gopay">GoPay</option>
                <option value="dana">Dana</option>
                <option value="shoppepay">Shoppepay</option>
              </select>
            </div>
  
            <!-- Tampilkan Total Harga -->
            <div class="mb-6">
              <h3 class="text-xl font-semibold">Total Pembayaran:</h3>
              <p class="text-2xl font-bold">$ {{ $total }}</p>
            </div>
  
            <!-- Tombol Proses Checkout -->
            <div>
              <a href="{{ route('checkout.process') }}" class="btn btn-primary">
                <button type="submit" class="bg-green-500 text-white font-bold py-3 px-6 rounded-md hover:bg-green-600 transition duration-150 ease-in-out">Proses Checkout</button>
              </a>
            </div>
          </form>
        @else
          <p>Keranjang belanja Anda kosong.</p>
        @endif
      </div>
    </div>
  </x-layout>
  