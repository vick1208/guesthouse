@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Transaction</h1>
    </div>

    <div class="table-responsive col-lg-19">
        <a href="/dashboard/register" class="btn btn-primary mb-3"><span data-feather="arrow-left"></span> Go to Register
            Guest Page</a>
        <a href="/dashboard/transaction/create" class="btn btn-success mb-3"><span data-feather="dollar-sign"></span> Pay</a>
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Harga kamar</th>
                    <th scope="col">Harga yang dibayar</th>
                    <th scope="col">Status pembayaran</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $tran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tran->guest_name }} </td>
                        <td>{{ $tran->room->number }}</td>
                        <td>{{ $tran->room->price }}</td>
                        <td>{{ $tran->paid_price }}</td>
                        <td>{{ $tran->pay_status }}</td>
                        <td>
                            <a href="/dashboard/transaction/{{ $tran->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>

                            <form action="/dashboard/transaction/{{ $tran->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Apakah Anda Ingin Menghapus?')"><span
                                        data-feather="x-octagon"></span></button>
                            </form>
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
@endsection
