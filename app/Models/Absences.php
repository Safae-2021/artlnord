<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absences extends Model
{
    use HasFactory;

    protected $fillable =[
        'student_id',
        'training_id',
        'date_absences'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    // public function student()
    // {
    //     return $this->belongsTo(Student::class,'student_id');
    // }

}
