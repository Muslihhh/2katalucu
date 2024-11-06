<x-layout>
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Shopping Cart</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($cart && $cart->items->count() > 0)
            <table class="w-full table-auto border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Image</th>
                        <th class="px-4 py-2 text-left">Product</th>
                        <th class="px-4 py-2 text-left">Price</th>
                        <th class="px-4 py-2 text-left">Quantity</th>
                        <th class="px-4 py-2 text-left">Total</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->items as $item)
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <img src="{{ asset('storage/' . ($item->product->images->first()->image_path ?? 'default-image.jpg')) }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-md">
                            </td>
                            <td class="px-4 py-2">{{ $item->product->name }}</td>
                            <td class="px-4 py-2">Rp.{{ number_format($item->price, 2) }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-input w-16 text-center">
                                    <button type="submit" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                                </form>
                            </td>
                            <td class="px-4 py-2">Rp.{{ number_format($item->price * $item->quantity, 2) }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-100">
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-right font-semibold">Total</td>
                        <td colspan="2" class="px-4 py-2">Rp.{{ number_format($total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>

            <div class="mt-4 flex justify-between items-center">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-md shadow-lg hover:bg-red-700 transition duration-300">Clear Cart</button>
                </form>
                {{-- <a href="{{ route('order.form') }}" class="bg-green-600 text-white px-6 py-3 rounded-md shadow-lg hover:bg-green-700 transition duration-300">Proceed to Checkout</a> --}}
            </div>
        @else
            <p class="text-center text-gray-500 mt-8">Your cart is empty.</p>
        @endif
    </div>
</x-layout>
