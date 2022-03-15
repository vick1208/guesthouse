@extends('dashboard.layouts.main')

@section('container')
    {{-- @dd($registers); --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Register Guest</h1>
    </div>

    <div class="table-responsive col-lg-19">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{-- <a href="/dashboard/register/create" class="btn btn-primary mb-3">Create new Registration</a> --}}
        <span data-bs-toggle="tooltip" data-bs-placement="right" title="Create new Registration">
            <button type="button" class="btn btn-sm btn-primary shadow-sm myBtn border rounded" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                {{-- <i class="fas fa-plus"></i> --}}
                Create new Registration
            </button>
        </span>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Tipe Registrasi</th>
                    <th scope="col">Check in</th>
                    <th scope="col">Check out</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registers as $reg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reg->guest->name }} </td>
                        <td>{{ $reg->room->number }}</td>
                        <td>{{ $reg->register_type }}</td>
                        <td>{{ $reg->check_in }}</td>
                        <td>{{ $reg->check_out }}</td>
                        <td>
                            <a href="/dashboard/register/{{ $reg->id }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/register/{{ $reg->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Guest has been recorded?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-sm btn-primary m-1" href="/dashboard/guest/create">No, create
                            new guest!</a>
                        <a class="btn btn-sm btn-success m-1" href="/dashboard/register/create">Yes, guest has been
                            recorded!</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
