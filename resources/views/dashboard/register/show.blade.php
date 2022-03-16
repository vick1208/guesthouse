@extends('dashboard.layouts.main')


@section('container')

{{-- @dd($reg); --}}
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="/dashboard/register" class="btn btn-success"><span data-feather="arrow-left"></span>Register Guest</a>
            <a href="/dashboard/register/{{ $reg->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>



            <h1>{{ $reg->guest->name }}</h1>
            <P>
                {{ $reg->register_type }}
            </P>
        </div>
    </div>
</div>


@endsection
