<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();
        $genders=[
           ['ar'=>"ذكر",'en'=>'male'] ,['ar'=>'انثي','en'=>"female"]
        ];

        foreach($genders as$gender){
            Gender::create(['Name'=>$gender]);
        }

    }
}
