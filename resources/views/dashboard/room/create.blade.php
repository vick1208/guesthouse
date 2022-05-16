@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">New Room </h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/rooms" method="post" class="mb-5">
    @csrf
    <div class="mb-3">
        <label for="type" class="form-label">Tipe Kamar</label>
        <select class="form-select" name="type_id">
           @foreach ( $types as $type)
            @if (old('type_id')== $type->id)
            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
            @else
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endif
           @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status Kamar</label>
        <select class="form-select" name="room_status_id">
           @foreach ( $status as $stat)
            @if (old('room_status_id')== $stat->name)
            <option value="{{ $stat->id }}" selected>{{ $stat->name }}</option>
            @else
            <option value="{{ $stat->id }}">{{ $stat->name }}</option>
            @endif
           @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="number" class="form-label">Nomor</label>
        <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number"
            value="{{ old('number') }}">

        @error('number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="capacity" class="form-label">Kapasitas</label>
        <input type="number" step="1" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity"
            value="{{ old('capacity') }}">

        @error('capacity')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Harga</label>
        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
            value="{{ old('price') }}">

        @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="view" class="form-label">Pemandangan</label>
        @error('view')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="view" type="hidden" name="view" value="{{ old('view') }}">
        <trix-editor input="view"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Create Room</button>

    </form>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
</script>
@endsection
