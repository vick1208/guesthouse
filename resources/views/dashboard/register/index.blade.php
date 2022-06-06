@extends('dashboard.layouts.main')

@section('container')
    {{-- @dd($registers); --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Register Guest</h1>
    </div>

    <div class="table-responsive col-lg-19">
        {{-- @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif --}}
        {{-- <a href="/dashboard/register/create" class="btn btn-primary mb-3">Create new Registration</a> --}}
        <span data-bs-toggle="tooltip" data-bs-placement="right" title="Create new Registration">
            <button type="button" class="btn btn-sm btn-primary shadow-sm myBtn border rounded" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                {{-- <i class="fas fa-plus"></i> --}}
                Create new Registration
            </button>
        </span>
        <a href="/dashboard/register" class="btn btn-primary mb-3"><span data-feather="arrow-right"></span> Go to Transaction Page</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Tipe Registrasi</th>
                    <th scope="col">Check in</th>
                    <th scope="col">Check out</th>
                    <th scope="col">Harga Kamar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registers as $reg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reg->guest_name }} </td>
                        <td>{{ $reg->room->number }}</td>
                        <td>{{ $reg->register_type }}</td>
                        <td>{{ \Carbon\Carbon::parse($reg->check_in)->isoFormat('D MMM YYYY') }}</td>
                        <td>{{ \Carbon\Carbon::parse($reg->check_out)->isoFormat('D MMM YYYY') }}</td>
                        <td>{{ $reg->room->price }}</td>
                        <td>
                            <a href="/dashboard/register/{{ $reg->id }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/register/{{ $reg->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/register/{{ $reg->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Apakah Anda Ingin Menghapus?')"><span
                                        data-feather="x-octagon"></span></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="15" class="text-center">
                            There's no data in this table
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Apakah tamu sudah pernah <i>booking</i> kamar?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-sm btn-primary m-1" href="/dashboard/guest/create">Buat tamu baru</a>
                        <a class="btn btn-sm btn-success m-1" href="/dashboard/register/create">Tamu sudah pernah</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
