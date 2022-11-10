<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Training_requireddocument extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'required_document_id',
    ];
    public $table = "training_requireddocuments";

    
}
