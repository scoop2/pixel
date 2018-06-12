<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('sets')->delete();
        DB::table('sets')->insert(array(
            0 => array(
                'active' => 1,
                'setorder' => 1,
                'released' => '2017-09-09 03:51:05',
                'title' => 'mucke a',
                'setlength' => 120,
                'bpm' => 90,
                'filename' => 'trackA.mp3',
                'description' => 'desc a',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            1 => array(
                'active' => 1,
                'setorder' => 1,
                'released' => '2017-01-08 03:51:05',
                'title' => 'mucke b',
                'setlength' => 120,
                'bpm' => 90,
                'filename' => 'trackB.mp3',
                'description' => 'desc a',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            3 => array(
                'active' => 1,
                'setorder' => 1,
                'released' => '2017-09-06 03:51:05',
                'title' => 'mucke a cc',
                'setlength' => 120,
                'bpm' => 90,
                'filename' => 'trackC.mp3',
                'description' => 'desc a',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            4 => array(
                'active' => 1,
                'setorder' => 1,
                'released' => '2017-09-06 01:51:05',
                'title' => '4. mucke',
                'setlength' => 190,
                'bpm' => 95,
                'filename' => 'trackC.mp3',
                'description' => 'desc a',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            )
        ));
    }
}