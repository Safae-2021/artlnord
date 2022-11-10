<?php

namespace App\Models;

use Illuminate\Dsoftatabase\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Str;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "user_id",
        'arabic_name',
        'n_professionnelle_carte',
        'n_permis',
        'categorie_permis_id',
        'date_obtention',
        'date_naissance',
        'lieu_naissance',       
        'status'
    ];

    protected $table            = 'students';

    protected $primaryKey       =  'id';

    public    $incrementing     =  false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $student->{$student->getKeyName()} = Str::uuid();
        });
    }



    public function requireddocuments()
    {
        return $this->belongsToMany(Requested_document::class,'requireddocument_student',"student_id","required_document_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoriepermis()
    {
        return $this->belongsTo(Categorie_permis::class,'categorie_permis_id');
    }

    public function absences()
    {
        return $this->hasMany(Absences::class);
    }
  
    public function registration(){
        return $this->hasOne(Registration::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

}
