<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Classroom extends Model
{

    // protected $guarded=[];

    use HasFactory;
    use HasTranslations;
    public $translatable = ['Name_Class'];

    public function Grade(){
        return $this->belongsTo(Grade::class,);
    }
}
