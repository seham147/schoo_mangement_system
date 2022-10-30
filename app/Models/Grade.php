<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['Name'];
    protected $guarded=[];


    public function Sections (){
        return $this->hasMany(section::class,'Grade_id');
    }


    
}
