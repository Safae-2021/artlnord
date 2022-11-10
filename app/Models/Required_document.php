<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Required_document extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
    ];


    public function students()
    {
        return $this->belongsToMany(Student::class,'requireddocument_student',"required_document_id","student_id");
    }

 

    public function trainings()
    {
        return $this->belongsToMany(Training::class,'training_requireddocuments',"required_document_id","training_id")
        ->using(Training_requireddocument::class);
    }
}
