<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    //
    protected $fillable=[
        'origin','destination','distance'
    ];
    public function booking(){
        return $this->hasOne('\App\booking');
    }
    public function customer(){
        return $this->hasOne('\App\customer');
    }
}
