<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable =[
        'label',
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
        'status',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
