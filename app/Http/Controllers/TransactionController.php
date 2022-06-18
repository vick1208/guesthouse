<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.transaction.index", [
            "transactions" => Transaction::with(['user', 'guest', 'room'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.transaction.pay", [
            'rooms' => Room::all(),
            'pays' => Payment::all()
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
        $valid = $request->validate([
            "room_id" => 'required',
            "guest_name" => 'required',
            "payment_id" => 'required',
            "paid_price" => 'required|numeric',
            "pay_status" => 'required'
        ]);

        $valid['user_id'] = auth()->user()->id;

        Transaction::create($valid);

        return redirect('/dashboard/register');
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
        return view('dashboard.transaction.edit', [
            'transaction' => Transaction::find($id),
            'rooms' => Room::all(),
            'pays' => Payment::all()
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
        // @dd($request,$id);
        $valid = $request->validate(
            [
                "room_id" => 'required',
                "guest_name" => 'required',
                "payment_id" => 'required',
                "paid_price" => 'required|numeric',
                "pay_status" => 'required'
            ]
        );
        $valid['user_id'] = auth()->user()->id;

        Transaction::where('id',$id)->update($valid);

        return redirect('/dashboard/transaction');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =Transaction::find($id);
        $delete->delete();

        return redirect('/dashboard/transaction');
    }
}
