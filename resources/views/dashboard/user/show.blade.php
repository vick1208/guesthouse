@extends('dashboard.layouts.main')


@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <a href="/dashboard/user" class="btn btn-success"><span data-feather="arrow-left"></span>Users List</a>
                <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>

                <form action="/dashboard/user/{{ $user->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger " onclick="return confirm('Apakah Anda Ingin Menghapus?')"><span
                            data-feather="x-octagon"></span>Delete</button>
                </form>


                <h1>Nama : {{ $user->name }}</h1>
                <h1>Role : {{ $user->role }}</h1>

            </div>
        </div>
    </div>
@endsection
