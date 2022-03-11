@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User List</h1>
</div>
<div class="table-responsive col-lg-19">
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- <a href="/dashboard/user/create" class="btn btn-primary mb-3">Create new User</a> --}}
    <span data-bs-toggle="tooltip" data-bs-placement="right" title="Create new User">
        <button type="button" class="btn btn-sm btn-primary shadow-sm myBtn border rounded" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">
            Create new User
        </button>
    </span>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="/dashboard/user/{{ $user->id }}" class="badge bg-info"><span
                                data-feather="eye"></span></a>
                        <a href="/dashboard/user/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                        <form action="/dashboard/user/{{ $user->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Apakah Anda Ingin Menghapus?')"><span
                                    data-feather="x-octagon"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>

                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <form action="/dashboard/user" method="post" class="mb-5">
                            @csrf
                            <div class="mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username"
                                    placeholder="Username" required value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror "
                                    id="name" placeholder="Name" required value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
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
                            </div>

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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
