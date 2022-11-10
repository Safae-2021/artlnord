<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'studentsnumber',
        'status'
    ];

     public function trainings()
    {
        return $this->belongsToMany(Training::class,'part_training',"part_id","training_id")
        ->using(Part_Training::class);
    }

}
