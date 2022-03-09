<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.guest.index',[
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
        return view('dashboard.guest.create',[
            'genders'=> ['Pria', 'Wanita']
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
        // @dd($request);
        $valid = $request->validate(
            [
                "name" => 'required|max:255',
                "address" => 'required',
                "gender" => 'required',
                "birthdate" => 'required|date',
                "job" => 'required'
            ]
        );
        $valid['user_id'] = auth()->user()->id;

        Guest::create($valid);
        return redirect('/dashboard/guest')->with('success','Data Guest ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        return view('dashboard.guest.show',[
            'guest' => $guest
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        return view('dashboard.guest.edit',[
            'guest' => $guest
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        $rules=  [
            "name" => 'required|max:255',
            "address" => 'required',
            "telephone" => 'required',
            "job" => 'required',

    ];
    if ($request->nik != $guest->nik) {
        $rules['nik'] = 'required|unique:guests|max:16';
    }

    if ($request->email != $guest->email) {
        $rules['email'] = 'required|unique:guests|email:dns';
    }
    $valid = $request->validate($rules);
    $valid['user_id'] = auth()->user()->id;

    Guest::where('id',$guest->id)->update($valid);

    return redirect('/dashboard/guest')->with('success','Guest telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        Guest::destroy($guest->id);
        return redirect('/dashboard/guest')->with('success','Guest telah dihapus.');
    }
}
