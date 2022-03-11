<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\RegisterGuest;
use App\Models\Room;
use Illuminate\Http\Request;

class RegisterGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.register.index',[
            "registers" => RegisterGuest::with(['user','guest','room'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.register.create', [
            'guests' => Guest::all(),
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
        $valid = $request->validate(
            [
                "room_id" => 'required',
                "guest_id" => 'required',
                "check_in" => 'required|date',
                "check_out" => 'required|date',
                "register_type" => 'required'
            ]
        );
        $valid['user_id'] = auth()->user()->id;

        RegisterGuest::create($valid);

        return redirect('/dashboard/register')->with('success','Guest telah diregistrasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.register.show',[
            'reg'=> RegisterGuest::find($id)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.register.edit',[
            'register'=> RegisterGuest::find($id),
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

        $valid = $request->validate(
            [
                "room_id" => 'required',
                "guest_id" => 'required',
                "check_in" => 'required|date',
                "check_out" => 'required|date',
                "register_type" => 'required'
            ]
        );
        $valid['user_id'] = auth()->user()->id;
        RegisterGuest::where('id',$id)->update($valid);

        return redirect('/dashboard/register')->with('success', 'Data register telah diubah.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RegisterGuest::destroy($id);
        return redirect('/dashboard/register')->with('success', 'Guest telah dihapus.');
    }
}
