<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['Name'];
    protected $guarded=[];

    public function specializations (){

        return $this->belongsTo(Specialization::class,'Specialization_id');
    }
    public function genders (){

        return $this->belongsTo(Gender::class,'Gender_id');
    }

    public function sections (){

        return $this->belongsTo(section::class,'teacher_section');
    }


}
