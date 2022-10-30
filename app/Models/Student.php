<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['Name'];
    protected $guarded=[];

    // public function genders(){
    //     return $this->belongsTo(Gender::class,'gender_id');
    // }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }


    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }

    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }


// علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب
public function images()
{
    return $this->morphMany(Image::class, 'imageable');
}

public function Nationality()
{
    return $this->belongsTo(Nationalities::class, 'nationalitie_id');
}
public function gender()
{
    return $this->belongsTo(Gender::class, 'gender_id');
}

public function myparent()
{
    return $this->belongsTo(My_Parent::class, 'parent_id');
}
}
