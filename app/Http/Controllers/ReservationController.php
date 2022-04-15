<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;



class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.reservation.index', [
            "reservations" => Reservation::with(['user', 'guest', 'room'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.reservation.create', [
            // 'guests' => Guest::all(),
            'rooms' => Room::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            "room_id" => 'required',
            "guest_name" => 'required',
            "check_in" => 'required|date',
            "check_out" => 'required|date',
            "reserved_by" => 'required',
            "status" => 'required'
        ]);

        $valid["user_id"] = auth()->user()->id;

        Reservation::create($valid);
        return redirect('/dashboard/reserve');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.reservation.edit',[
            "reservation" => Reservation::find($id),
            'guests' => Guest::all(),
            'rooms' => Room::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            "room_id" => 'required',
            "guest_name" => 'required',
            "check_in" => 'required|date',
            "check_out" => 'required|date',
            "reserved_by" => 'required',
            "status" => 'required'
        ]);

        $valid["user_id"] = auth()->user()->id;

        Reservation::where('id',$id)->update($valid);

        return redirect('/dashboard/reserve');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservation::destroy($id);
        return redirect('/dashboard/reserve');
    }
}
