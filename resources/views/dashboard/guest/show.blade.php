@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">


            <a href="/dashboard/guest" class="btn btn-success"><span data-feather="arrow-left"></span>Guests Data</a>
            <a href="/dashboard/guest/{{ $id->nik }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>

            <form action="/dashboard/guest/{{ $id->nik }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger " onclick="return confirm('Apakah Anda Ingin Menghapus?')"><span
                        data-feather="x-octagon"></span>Delete</button>
            </form>


            <h1>Nama : {{ $id->name }}</h1>



        </div>
    </div>
</div>
@endsection
