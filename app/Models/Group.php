<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable =[
        'label',
        'training_id',
        'room_id',
        'teacher_id',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class,'training_id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
}
