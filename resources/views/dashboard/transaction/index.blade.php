@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaction</h1>
</div>

<div class="table-responsive col-lg-19">
    <a href="#" class="btn btn-success mb-3"><span data-feather="dollar-sign"></span> Create payment</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Kamar</th>

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<a href="/dashboard" class="btn btn-primary mb-3"><span data-feather="arrow-left"></span> Back to Main Page</a>
@endsection
