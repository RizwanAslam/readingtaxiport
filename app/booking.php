<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    //
    protected $fillable=[
            'location_id',
            'vehicalType',
            'occupants',
            'luggage',
            'suitcase',
            'journey',
            'pickup_time',
            'cost'
    ];
    public function location(){
        return $this->belongsTo('\App\location');
    }
    public function customer(){
        return $this->hasOne('\App\customer');
    }
}
