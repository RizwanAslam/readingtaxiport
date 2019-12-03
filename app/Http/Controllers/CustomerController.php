<?php

namespace App\Http\Controllers;

use App\customer;
use App\booking;
use Illuminate\Http\Request;
use Mail;

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
            $data='sadia is great';
            Mail::send('emails.mail',$data,function($message){
                $message->to('sadiaarooj111@gmail.com','Sadia Arooj')
                ->subject('testing');
                $message->from('sadiaarooj111@gmail.com','Sadia Arooj');
            });
            $record=customer::find($create->id);
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
