@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Payment</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/transaction" method="post" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror "
                id="name" placeholder="Name" required value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" name="role">
                @foreach ($roles as $role)
                    @if (old('role') == $role)
                        <option value="{{ $role }}" selected>{{ $role }}</option>
                    @else
                        <option value="{{ $role }}">{{ $role }}</option>
                    @endif
                @endforeach
            </select>
        </div> --}}

        <div class="mb-3">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="Email" required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password"
                class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                placeholder="Password" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>

    </form>
</div>
@endsection
