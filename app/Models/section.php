<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class section extends Model
{
    use HasFactory;
    // protected $guarded=[];

    use HasTranslations;
    public $translatable = ['Name_Section'];


     public function My_classs()
     {
        return $this->belongsTo(Classroom::class,'Class_id');
     }

     public function teachers (){

      return $this->BelongsToMany(Teacher::class,'teacher_section');
  }
}
