@extends('layout')

@section('content')
    <h1>Daftar Kategori</h1>
    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
@endsection
