<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('skills')->delete();
        DB::table('skills')->insert(array(
            0 => array(
                // 'id' => 1,
                'active' => 1,
                'title' => 'first skill',
                'description' => 'desc a',
                'skillscats_id' => 1,
                'perc' => 48,
                'icon' => 'fab fa-sass',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            1 => array(
                // 'id' => 2,
                'active' => 1,
                'title' => '2nd skill',
                'description' => 'blassss',
                'skillscats_id' => 2,
                'perc' => 97,
                'icon' => 'fab fa-gulp',
                'created_at' => '2017-09-09 03:53:21',
                'updated_at' => '2017-09-09 03:53:21',
            ),
            1 => array(
                // 'id' => 2,
                'active' => 1,
                'title' => '2ndxxx skxxx xxxill',
                'description' => 'blasa as as a as as as sss',
                'skillscats_id' => 2,
                'perc' => 97,
                'icon' => 'fab fa-php',
                'created_at' => '2017-09-09 03:53:21',
                'updated_at' => '2017-09-09 03:53:21',
            ),
        ));
    }
}
