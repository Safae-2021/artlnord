<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class Requireddocument_student extends Pivot
{
    use HasFactory;

    protected $fillable =[
        'required_document_id',
        'student_id' ,         
        'training_id', 
        'image_path' ,     
    ];




    
}
