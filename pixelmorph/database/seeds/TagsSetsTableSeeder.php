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
                'tag' => '1',
                'rate' => '10',
            ),
            1 => array(
                'setid' => '1',
                'tag' => '2',
                'rate' => '5',
            ),
            2 => array(
                'setid' => '2',
                'tag' => '1',
                'rate' => '4',
            ),
            3 => array(
                'setid' => '2',
                'tag' => '2',
                'rate' => '8',
            ),
            4 => array(
                'setid' => '3',
                'tag' => '3',
                'rate' => '5',
            ),
            5 => array(
                'setid' => '3',
                'tag' => '4',
                'rate' => '5',
            ),
            6 => array(
                'setid' => '3',
                'tag' => '5',
                'rate' => '1'
            ),
            7 => array(
                'setid' => '4',
                'tag' => '5',
                'rate' => '5'
            )
        ));
    }
}
