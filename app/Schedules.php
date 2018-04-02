<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booking_id' ,'room_id' ,'start' ,'end',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
