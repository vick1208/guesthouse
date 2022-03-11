@extends('dashboard.layouts.main')


@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="/dashboard/room" class="btn btn-success"><span data-feather="arrow-left"></span>Rooms List</a>


            <a href="/dashboard/room/{{ $room->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>

            <form action="/dashboard/room/{{ $room->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger " onclick="return confirm('Apakah Anda Ingin Menghapus?')"><span
                        data-feather="x-octagon"></span>Delete</button>
            </form>



            <h1>Type : {{ $room->type->name }}</h1>
            <h1>Status : {{ $room->roomStatus->name }}</h1>


                {!! $room->view !!}


        </div>
    </div>
</div>
@endsection
