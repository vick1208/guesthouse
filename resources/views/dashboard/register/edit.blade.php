@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Register</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/register/{{ $register->id }}" method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="room" class="form-label">Kamar</label>
                <select class="form-select" name="room_id">
                    @foreach ($rooms as $room)
                        @if (old('room_id', $register->room->id) == $room->id)
                            <option value="{{ $room->id }}" selected>{{ $room->number }}</option>
                        @else
                            <option value="{{ $room->id }}">{{ $room->number }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="guest" class="form-label">Tamu</label>
                <select class="form-select" name="guest_id">
                    @foreach ($guests as $guest)
                        @if (old('guest_id', $register->guest->id) == $guest->id)
                            <option value="{{ $guest->id }}" selected>{{ $guest->name }}</option>
                        @else
                            <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="check_in" class="form-label">Tanggal <i>Check In</i></label>
                <input type="date" class="form-control @error('check_in') is-invalid @enderror" name="check_in"
                    id="check_in" value="{{ old('check_in', $register->check_in) }}">
                @error('check_in')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="check_out" class="form-label">Tanggal <i>Check Out</i></label>
                <input type="date" class="form-control @error('check_out') is-invalid @enderror" name="check_out"
                    id="check_out" value="{{ old('check_out', $register->check_out) }}">
                @error('check_out')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="register_type" class="form-label">Tipe Registrasi</label>
                <input type="text" class="form-control @error('register_type') is-invalid @enderror" id="register_type"
                    name="register_type" value="{{ old('register_type', $register->register_type) }}">
                @error('register_type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
