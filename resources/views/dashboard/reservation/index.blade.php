@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Reservation Room</h1>
    </div>

    <div class="d-flex justify-content-evenly ">

        <button type="button" class="btn btn-success btn-lg shadow-sm myBtn border rounded" data-bs-toggle="modal"
            data-bs-target="#checkin">Check In</button>
        <button type="button" class="btn btn-danger btn-lg shadow-sm myBtn border rounded" data-bs-toggle="modal"
            data-bs-target="#checkout">Check Out</button>


    </div>
    <div class="table-responsive col-lg-19 border-top my-5">
        <h5 class="text-center my-3">Reservation History</h5>
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
                    <th scope="col">Name</th>
                    <th scope="col">Room</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Job</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="modal fade" id="checkin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Guest?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-sm btn-success m-1"
                            href="/dashboard/guest/create">Yes, create
                            new guest!</a>
                        {{-- <a class="btn btn-sm btn-success m-1"
                            href="/dashboard/register/create">Yes, guest has been recorded!</a> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="checkout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
