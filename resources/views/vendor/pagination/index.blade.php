@extends('layout')

@if(count($products) > 0)
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - ${{ $product->price }}</li>
        @endforeach
    </ul>
@else
    <p>No products found.</p>
@endif


@section('content')
    <h1>Daftar Kategori</h1>
    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
@endsection
