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
                'promo' => 0,
                'setorder' => 1,
                'released' => '2017-03-09 03:51:05',
                'title' => 'Zauberwesen Pokes Around The World',
                'setlength' => 75,
                'bpm' => 121,
                'filename' => 'zauberwesen_pokes_around_the_world.mp3',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            1 => array(
                'active' => 1,
                'promo' => 0,
                'setorder' => 1,
                'released' => '2016-10-07 03:51:05',
                'title' => 'Sie Kamen Aus Rackzoohm',
                'setlength' => 85,
                'bpm' => 123,
                'filename' => 'sie_kamen_aus_rackzoohm.mp3',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            2 => array(
                'active' => 1,
                'promo' => 0,
                'setorder' => 1,
                'released' => '2017-01-05 03:51:05',
                'title' => 'Mondseeanbewohner',
                'setlength' => 69,
                'bpm' => 122,
                'filename' => 'mondseeanbewohner.mp3',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            3 => array(
                'active' => 1,
                'promo' => 0,
                'setorder' => 1,
                'released' => '2016-02-05 03:51:05',
                'title' => 'Liquid Session In Hamburg I',
                'setlength' => 74,
                'bpm' => 118,
                'filename' => 'liquid_session_in_hamburg_01.mp3',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            4 => array(
                'active' => 1,
                'promo' => 0,
                'setorder' => 1,
                'released' => '2016-02-09 03:51:05',
                'title' => 'Liquid Session In Hamburg II',
                'setlength' => 97,
                'bpm' => 123,
                'filename' => 'liquid_session_in_hamburg_02.mp3',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            5 => array(
                'active' => 1,
                'promo' => 0,
                'setorder' => 1,
                'released' => '2017-03-19 03:51:05',
                'title' => 'Keine Bademeister Bitte!',
                'setlength' => 75,
                'bpm' => 122,
                'filename' => 'keine_bademeister_bitte.mp3',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            6 => array(
                'active' => 1,
                'promo' => 0,
                'setorder' => 1,
                'released' => '2017-07-11 03:51:05',
                'title' => 'Dubno',
                'setlength' => 73,
                'bpm' => 122,
                'filename' => 'dubno.mp3',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
            7 => array(
                'active' => 1,
                'promo' => 0,
                'setorder' => 1,
                'released' => '2017-07-11 03:51:05',
                'title' => 'Autophan',
                'setlength' => 53,
                'bpm' => 122,
                'filename' => 'autophan.mp3',
                'description' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05'
            ),
        ));
    }
}