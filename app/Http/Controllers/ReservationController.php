<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        return view('dashboard.reservation.index');
    }

    public function create(){
        return view('dashboard.reservation.create',[
            'guests' => Guest::all(),
            'rooms' => Room::all()
        ]);
    }

    public function store(Request $request)
    {
        return redirect(route('reserve'));
    }


}
