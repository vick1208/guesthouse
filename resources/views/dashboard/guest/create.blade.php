@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Tamu Baru</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/guest" method="post" class="row mb-5">
            @csrf
            <div class="col-md-8 mb-3">
                <label for="id_number" class="form-label">NIK/Paspor/SIM</label>
                <input type="text" class="form-control @error('id_number') is-invalid @enderror" id="id_number" name="id_number"
                    value="{{ old('id_number') }}">

                @error('id_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-5 mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-5 mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    value="{{ old('address') }}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-5 mb-3">
                <label for="nationality" class="form-label">Kebangsaan</label>
                <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality"
                    value="{{ old('nationality') }}">
                @error('nationality')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="telephone" class="form-label">Telephone</label>
                <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                    name="telephone" value="{{ old('telephone') }}">
                @error('telephone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}


            <div class="col-md-5 mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="gender">
                   @foreach ( $genders as $gender)
                    @if (old('gender')==$gender)
                    <option value="{{ $gender }}" selected>{{ $gender }}</option>
                    @else
                    <option value="{{ $gender}}">{{ $gender }}</option>
                    @endif
                   @endforeach
                </select>
            </div>

            {{-- <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <div class="col-md-5 mb-3">
                <label for="birthdate" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('birthdate')
                is-invalid
                @enderror" name="birthdate" id="birthdate" value="{{ old('birthdate') }}">
                @error('birthdate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="job" class="form-label">Jabatan</label>
                <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" name="job"
                    value="{{ old('job') }}">
                @error('job')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Create Guest</button>

            </div>

        </form>
    </div>
@endsection
