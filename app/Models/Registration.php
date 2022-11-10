<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'student_id',
        'training_id',
        'date_registration'
    ];

    public function training()
    {
        return $this->belongsTo(Training::class,'training_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }

}
