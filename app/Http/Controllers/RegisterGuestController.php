<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\RegisterGuest;
use App\Models\Room;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;

class RegisterGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $register = $this->;
        $regs = RegisterGuest::with('user', 'room', 'guest');

        // if (!empty($request->search)) {
        //     $regs = $regs->where('id', '=', $request->search);
        // }
        return view('dashboard.register.index',compact('regs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\registerguest  $registerguest
     * @return \Illuminate\Http\Response
     */
    public function show(registerguest $registerguest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\registerguest  $registerguest
     * @return \Illuminate\Http\Response
     */
    public function edit(registerguest $registerguest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\registerguest  $registerguest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registerguest $registerguest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\registerguest  $registerguest
     * @return \Illuminate\Http\Response
     */
    public function destroy(registerguest $registerguest)
    {
        //
    }
}
