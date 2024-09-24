@extends('layout')

@section('content')
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>
    <!-- Tambahkan detail lainnya jika diperlukan -->
@endsection
