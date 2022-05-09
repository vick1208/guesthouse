<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\Type;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.room.index',[
            'rooms'=> Room::with(['type','roomstatus'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.room.create',[
            'types' => Type::all(),
            'status' => RoomStatus::all()
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
            "type_id" => 'required|string',
            "room_status_id"=> 'required|string',
            "number"=>'required|max:255',
            "capacity" => 'required',
            "price" => 'required',
            "view" => 'required'
        ]);

        Room::create($valid);
        return redirect('/dashboard/room')->with('success', 'Data Room ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('dashboard.room.show',[
            'room' => $room

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('dashboard.room.edit',[
            'room' => $room,
            'types' => Type::all(),
            'status' => RoomStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {


        $rules = [
            "type_id" => 'required|string',
            "room_status_id"=> 'required|string',
            "number"=>'required|max:255',
            "capacity" => 'required',
            "price" => 'required',
            "view" => 'required'
        ];

        $validated = $request->validate($rules);
        Room::where('id',$room->id)->update($validated);

        return redirect('/dashboard/room')->with('success', 'Room telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        Room::destroy($room->id);
        return redirect('/dashboard/room')->with('success', 'Room telah dihapus.');
    }

    public function getRoom(Request $request){

        $data = Room::find($request->id);

        return response()->json($data);
    }


}
