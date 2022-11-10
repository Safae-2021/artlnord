<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Part_training extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'part_id',
    ];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
