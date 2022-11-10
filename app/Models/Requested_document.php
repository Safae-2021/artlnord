<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requested_document extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
    ];

    public function trainings()
    {
        return $this->belongsToMany(Training::class,'training_requireddocuments',"requested_document_id","training_id")
        ->using(Training_requesteddocument::class);
    }
}
