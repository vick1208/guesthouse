<?php

namespace App\Http\Controllers;

// use App\Models\Guest;
use App\Models\RegisterGuest;
use App\Models\Room;
use Illuminate\Http\Request;
// use Illuminate\Validation\ValidationException;

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
                "guest_name" => 'required',
                "check_in" => 'required|date',
                "check_out" => 'required|date',
                "price" => 'required|numeric',
                "register_type" => 'required'
            ]
        );
        $valid['user_id'] = auth()->user()->id;

        Room::find($valid['room_id'])->update(['room_status_id'=>"2"]);

        RegisterGuest::create($valid);


        // return redirect('/dashboard/register')->with('success','Guest telah diregistrasi');
        return redirect('/dashboard/transaction');


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
            // 'guests' => Guest::all(),
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
        // @dd($request);

        $valid = $request->validate(
            [
                "room_id" => 'required',
                "guest_name" => 'required',
                "check_in" => 'required|date',
                "check_out" => 'required|date',
                "price" => 'required',
                "register_type" => 'required'
            ]
        );
        $valid['user_id'] = auth()->user()->id;


        RegisterGuest::where('id',$id)->update($valid);
        // $room = Room::find($request->room_id);
        // if ($room) {
        //     $room->room_status_id = 2;
        //     $room->save();
        // }

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
        $reg_guest = RegisterGuest::find($id);
        $room = Room::find($reg_guest->room_id);
        if ($room) {
            $room->room_status_id = 1;
            $room->save();
        }
        $reg_guest->delete();

        // RegisterGuest::destroy($id);
        return redirect('/dashboard/register')->with('success', 'Guest telah dihapus.');
    }


    // public function getRoom(Request $request){

    //     $data = Room::find($request->id);

    //     return response()->json($data);


    // }






}
