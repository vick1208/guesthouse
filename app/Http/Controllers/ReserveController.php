<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.reservation.index',[
            'guests'=> Guest::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.reservation.create');
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
                "nik" => 'required|unique:guests|max:16',
                "name" => 'required|max:255',
                "address" => 'required',
                "telephone" => 'required',
                "email" => 'required|unique:guests|email:dns',
                "job" => 'required'
            ]
        );
        $valid['user_id'] = auth()->user()->id;

        Guest::create($valid);
        return redirect('/dashboard/reserve')->with('success','Data Guest ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {
        return view('dashboard.reservation.show',[
            'id' => Guest::where('nik',$nik)->firstOrFail()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        $delete = Guest::where('nik',$nik)->get();
        Guest::destroy($delete);

        return redirect('/dashboard/reserve')->with('success','Guest telah dihapus.');

    }
}
