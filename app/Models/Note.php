<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable =[
        'note',
        'student_id',
        'training_id',
        'part_training_id'
    ];

    public function training()
    {
        return $this->belongsTo(Training::class,'training_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function parttraining()
    {
        return $this->belongsTo(Part_training::class,'part_training_id');
    }

}
