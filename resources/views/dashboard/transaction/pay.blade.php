@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Payment</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/transaction" method="post" class="row mb-5">
            @csrf
            <div class="col-md-3 mb-3">
                <label for="room_id" class="form-label">Kamar</label>
                <select class="form-select" name="room_id" id="room_id">
                    <option value="-1" selected disabled>Nomor Kamar</option>
                    @foreach ($rooms as $room)
                        @if (old('room_id') == $room->id)
                            <option value="{{ $room->id }}">{{ $room->number }}</option>
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
                <label for="payment_id" class="form-label">Metode Pembayaran</label>
                <select class="form-select" name="payment_id" id="payment_id">
                    <option value="-1" selected disabled>Payment method</option>
                    @foreach ($pays as $pay)
                        @if (old('payment_id') == $pay->id)
                            <option value="{{ $pay->id }}">{{ $pay->name }}</option>
                        @else
                            <option value="{{ $pay->id }}">{{ $pay->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label for="paid_price" class="form-label">Harga yang dibayar</label>
                <input type="number" step="0.01" class="form-control @error('paid_price') is-invalid @enderror" id="paid_price"
                    name="paid_price" value="{{ old('paid_price') }}">

                @error('paid_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="pay_status" class="form-label">Status Pembayaran</label>

                <input type="text" class="form-control @error('pay_status') is-invalid @enderror" id="pay_status"
                    name="pay_status" value="{{ old('pay_status') }}">

                @error('pay_status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Buat Payment</button>

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

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $('#room_id').on('change', (event) => {
            // console.log(event);
            room(event.target.value).then(room => {
                $('#price').val(room.price);
            });
        })

        async function room(id) {
            let response = await fetch('/dashboard/room?id=' + id)
            let data = await response.json();

            return data;
        }
    </script>
@endsection
