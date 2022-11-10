<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'startdate',
        'enddate',
        'starttime',
        'endtime',
        'scan_cin',
        'photo',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

}
