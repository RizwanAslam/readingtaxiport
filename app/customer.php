<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    
    public function booking(){
        return $this->belongsTo('\App\booking');
    }
    public function location(){
        return $this->belongsTo('\App\location');
    }
    protected $fillable=[
        'location_id',
        'vehical_id',
        'name',
        'company',
        'email',
        'telephone',
        'flightinfo',
        'flightphone',
        'meetgreet',
        'aditionalinfo'
];
}

