@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>

    <img src="{{ asset('img/Exterior guest house.png') }}" alt="halaman depan guest house" width="600px"  class="rounded mx-auto d-block img-fluid">

    <h1 class="text-center fw-light">Guest House D'Strawberry</h1>


@endsection
