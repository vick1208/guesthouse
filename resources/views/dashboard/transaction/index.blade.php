@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaction</h1>
</div>

<div class="d-flex justify-content-evenly">

    <button type="button" class="btn btn-primary btn-lg shadow-sm myBtn border rounded" data-bs-toggle="modal"
    data-bs-target="#register">Register</button>
    <button type="button" class="btn btn-primary btn-lg shadow-sm myBtn border rounded" data-bs-toggle="modal"
    data-bs-target="#reserve">Reservation</button>


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
                        <a class="btn btn-sm btn-primary m-1" href="/dashboard/transaction/checkin">Check In</a>
                        <a class="btn btn-sm btn-warning m-1" href="/dashboard/transaction/checkout">Check Out</a>
                        <a class="btn btn-sm btn-danger m-1" href="/dashboard/transaction/overdue">Over Due</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reserve" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reservation Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-sm btn-success m-1" href="/dashboard/transaction/dp">Down Payment</a>
                        <a class="btn btn-sm btn-danger m-1" href="/dashboard/transaction/cancel">Cancel</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
