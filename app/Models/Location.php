<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'titlear',
        'labelone',
        'labelonear',
        'labeltwo',
        'labeltwoar',
        'labelthree',
        'labelthreear',
        'description',
        'descriptionar',
        'photo',
        'status'
    ];
}
