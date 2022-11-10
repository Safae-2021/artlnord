<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class Training_requesteddocument extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'requested_document_id',
    ];
}
