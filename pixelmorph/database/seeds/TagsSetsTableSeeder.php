<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSetsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tags_sets')->delete();
        DB::table('tags_sets')->insert(array(
            0 => array(
                'setid' => '1',
                'tag' => '3',
                'rate' => '4',
            ),
            1 => array(
                'setid' => '1',
                'tag' => '4',
                'rate' => '4',
            ),
            2 => array(
                'setid' => '1',
                'tag' => '5',
                'rate' => '9',
            ),
            3 => array(
                'setid' => '1',
                'tag' => '9',
                'rate' => '6',
            ),
            4 => array(
                'setid' => '1',
                'tag' => '11',
                'rate' => '10',
            ),
            5 => array(
                'setid' => '2',
                'tag' => '5',
                'rate' => '8',
            ),
            6 => array(
                'setid' => '2',
                'tag' => '1',
                'rate' => '7'
            ),
            7 => array(
                'setid' => '6',
                'tag' => '5',
                'rate' => '4'
            )
        ));
    }
}
