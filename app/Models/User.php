<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable      = [
        'name',
        'email',
        'password',
        'role_id',    
        'phone',
        'cin',
        'photo',
        'address',
        'status',
    ];

    protected $table            = 'users';

    protected $primaryKey       =  'id';

    public    $incrementing     =  false;

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $student->{$student->getKeyName()} = Str::uuid();
        });
    }

    public function students()
    {
        return $this->hasMany(Trainee::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
