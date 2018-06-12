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
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            1 => array(
                // 'id' => 2,
                'active' => 1,
                'title' => '2nd skill',
                'description' => 'blassss',
                'skillscats_id' => 2,
                'created_at' => '2017-09-09 03:53:21',
                'updated_at' => '2017-09-09 03:53:21'
            )
        ));
    }
}