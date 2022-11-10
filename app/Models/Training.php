<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;


class Training extends Model
{
    
    use HasFactory , SoftDeletes  ;
    
    protected $fillable = [
        'label',
        'room_id',
        'startdate',
        'enddate',
        'starttime',
        'endtime',
        'teacher_id',
        'training_part_id',
        'studenttotalnumber',
        'description',
        'order',
        'status',
    ];

    protected $table            = 'trainings';

    protected $primaryKey       =  'id';

    public    $incrementing     =  false;

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($training) {
            $training->{$training->getKeyName()} = Str::uuid();
        });
    }



  

    public function parts()
    {
        return $this->belongsToMany(Part::class,'part_training',"training_id","part_id");
    }

    public function requireddocuments()
    {
        return $this->belongsToMany(Required_document::class,'training_requireddocuments',"training_id","required_document_id");
    }
    
    public function requesteddocuments()
    {
        return $this->belongsToMany(Requested_document::class,'training_requesteddocuments',"training_id","requested_document_id");
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
