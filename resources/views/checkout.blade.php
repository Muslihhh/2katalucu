@extends('layouts.app')

@section('content')
<form action="{{ url('/checkout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Checkout</button>
</form>

@if (session('message'))
    <p>{{ session('message') }}</p>
@endif
@endsection
