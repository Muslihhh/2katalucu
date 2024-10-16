<x-layout>
    <x-slot:title>{{ $title}}</x-slot:title>
    
   
        <form method="GET" action="{{ route('products.index') }}">
            <select name="province_id" id="province">
                <option value="">Pilih Provinsi</option>
                {{-- @foreach($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach --}}
            </select>
    
            <select name="regency_id" id="regency">
                <option value="">Pilih Kabupaten</option>
            </select>
    
            <button type="submit">Filter</button>
        </form>
    
        <div>
            <h2>Daftar Produk</h2>
            {{-- @foreach($products as $product)
                <div>
                    <h3>{{ $product->name }}</h3>
                    <p>Harga: {{ $product->price }}</p>
                    <p>Deskripsi: {{ $product->description }}</p>
                </div>
            @endforeach --}}
        </div>
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            $('#province').on('change', function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: '/get-regencies/' + provinceId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#regency').empty();
                            $('#regency').append('<option value="">Pilih Kabupaten</option>');
                            $.each(data, function(key, value) {
                                $('#regency').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#regency').empty();
                }
            });
        </script>
    


  </x-layout>