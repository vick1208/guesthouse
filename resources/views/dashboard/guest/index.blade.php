@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Guest History</h1>
    </div>

    <div class="table-responsive col-lg-19">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{-- <a href="/dashboard/guest/create" class="btn btn-primary mb-3">Create new Guest</a> --}}

        {{-- <span data-bs-toggle="tooltip" data-bs-placement="right" title="Create new Guest">
            <button type="button" class="btn btn-sm btn-primary shadow-sm myBtn border rounded" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                Create new Guest
            </button>
        </span> --}}
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guests as $guest)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guest->address }}</td>
                    <td>{{ $guest->gender }}</td>
                    <td>{{ $guest->job }}</td>
                    <td>
                        <a href="/dashboard/guest/{{ $guest->id }}" class="badge bg-info"><span
                                data-feather="eye"></span></a>
                        <a href="/dashboard/guest/{{ $guest->id }}/edit" class="badge bg-warning"><span
                                data-feather="edit"></span></a>

                        <form action="/dashboard/guest/{{ $guest->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Apakah Anda Ingin Menghapus?')"><span
                                    data-feather="x-octagon"></span></button>
                        </form>
                    </td>
                </tr>
                @empty
                <td colspan="15" class="text-center">
                    There's no data in this table
                </td>
                @endforelse

            </tbody>
        </table>
    </div>
    {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Guest List?</h5>

                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-sm btn-primary m-1" href="/dashboard/guest/create">Add Guest</a>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
