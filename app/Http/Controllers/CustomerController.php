<?php

namespace App\Http\Controllers;
use App\Mail\BookingConfirmation;
use App\Mail\ReceiveMail;
use Mail;
use App\customer;
use App\booking;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       $create= customer::create([
            'location_id'=>$request->location_id,
            'vehical_id'=>$request->vehical_id,
            'name'=>$request->name,
            'company'=>$request->company,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
            'flightinfo'=>$request->flightinfo,
            'flightphone'=>$request->flightphone,
            'meetgreet'=>$request->meetgreet,
            'aditionalinfo'=>$request->aditionalinfo
        ]);
        booking::where('id',$request->vehical_id)->update(['cost'=>$request->costupdate]);
        if($create){
            $record=customer::find($create->id);
            Mail::to($create)->send(new BookingConfirmation());
            Mail::to('saadat.bhutto@gmail.com')->send(new ReceiveMail());
            return view('final',compact('record'));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
       $records= $customer::all();
        return view('admin',compact('records'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
}
