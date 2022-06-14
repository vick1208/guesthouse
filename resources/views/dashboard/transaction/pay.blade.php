@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Payment</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/transaction" method="post" class="row mb-5">
            @csrf
            <div class="col-md-3 mb-3">
                <label for="room_id" class="form-label">Room</label>
                <select class="form-select" name="room_id" id="room_id">
                    @foreach ($rooms as $room)
                        @if (old('room_id') == $room->id)
                            <option value="{{ $room->id }}" selected>{{ $room->number }}</option>
                        @else
                            <option value="{{ $room->id }}">{{ $room->number }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="guest_name" class="form-label">Tamu</label>

                <input type="text" class="form-control @error('guest_name') is-invalid @enderror" id="guest_name"
                    name="guest_name" value="{{ old('guest_name') }}">

                @error('guest_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="col-md-5 mt-4">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#guest">Tamu
                    Lama</button>

            </div>
            <div class="w-100"></div>

            <div class="col-md-3 mb-3">
                <label for="payment" class="form-label">Metode Pembayaran</label>
                <input type="text" class="form-control @error('payment') is-invalid @enderror" id="payment" name="payment"
                    value="{{ old('payment') }}">
                @error('payment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-5 mb-3">
                <label for="status" class="form-label">Status Reservasi</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status"
                    value="{{ old('status') }}">
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Create Reservation</button>

            </div>

        </form>
    </div>
    <div class="modal fade" id="guest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Daftar Tamu Lama</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div x-data>
                        <livewire:guest-table />

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
