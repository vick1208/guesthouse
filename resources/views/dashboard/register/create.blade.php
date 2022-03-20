@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Registering Guest</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/register" method="post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="room" class="form-label">Kamar</label>
                <select class="form-select" name="room_id">
                    @foreach ($rooms as $room)
                        @if (old('room_id') == $room->id)
                            <option value="{{ $room->id }}" selected>{{ $room->number }}</option>
                        @else
                            <option value="{{ $room->id }}">{{ $room->number }}</option>
                        @endif
                    @endforeach
                </select>
            </div>



            <div class="mb-3">
                <label for="guest" class="form-label">Tamu</label>
                <select class="form-select" name="guest_id">
                    @foreach ($guests as $guest)
                        @if (old('guest_id') == $guest->id)
                            <option value="{{ $guest->id }}" selected>{{ $guest->name }}</option>
                        @else
                            <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="check_in" class="form-label">Tanggal <i>Check In</i> </label>
                <input type="date" class="form-control @error('check_in') is-invalid @enderror" name="check_in"
                    id="check_in" value="{{ old('check_in') }}">
                @error('check_in')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="check_out" class="form-label">Tanggal <i>Check Out</i> </label>
                <input type="date" class="form-control @error('check_out') is-invalid @enderror" name="check_out"
                    id="check_out" value="{{ old('check_out') }}">
                @error('check_out')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="register_type" class="form-label">Tipe Registrasi</label>
                <input type="text" class="form-control @error('register_type') is-invalid @enderror" id="register_type"
                    name="register_type" value="{{ old('register_type') }}">
                @error('register_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <div class="mb-3">
                <button type="button" class="btn btn-primary btn-sm
                 shadow-sm myBtn border rounded"
                    data-bs-toggle="modal" data-bs-target="#register">Transaction</button>

            </div>


            <button type="submit" class="btn btn-primary">Register</button>


        </form>
    </div>

    <div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        {{-- <a class="btn btn-sm btn-primary m-1" href="/dashboard/transaction/checkin">Check In</a>
                        <a class="btn btn-sm btn-danger m-1" href="/dashboard/transaction/checkout">Check Out</a> --}}
                        <a class="btn btn-sm btn-primary m-1" href="/dashboard/transaction">Price</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
