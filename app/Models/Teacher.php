<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'cin',
        'password',
        'photo',
        'phone',
        'address',
        'scan_cin',
        'status',
    ];

    protected $table            = 'teachers';

    protected $primaryKey       =  'id';

    public    $incrementing     =  false;

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($teacher) {
            $teacher->{$teacher->getKeyName()} = Str::uuid();
        });
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    
}
