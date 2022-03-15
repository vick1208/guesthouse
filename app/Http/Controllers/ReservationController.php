<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        return view('dashboard.reservation.index');
    }

    public function create(){
        return view('dashboard.reservation.create');
    }

    public function store(Request $request)
    {
        return redirect(route('reserve'));
    }


}
