@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">


            <a href="/dashboard/guest" class="btn btn-success"><span data-feather="arrow-left"></span>Guests List</a>
            <a href="/dashboard/guest/{{ $guest->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>

            <form action="/dashboard/guest/{{ $guest->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger " onclick="return confirm('Apakah Anda Ingin Menghapus?')"><span
                        data-feather="x-octagon"></span>Delete</button>
            </form>


            <h1>Nama : {{ $guest->name }}</h1>



        </div>
    </div>
</div>
@endsection
