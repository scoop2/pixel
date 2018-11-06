<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VitaTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vitas')->delete();
        DB::table('vitas')->insert(array(
            0 => array(
                'title' => 'Soziales Fachabitur / Wasserburg a. Inn',
                'desc' => '',
                'datumstart' => '1994-01-01 12:00:00',
                'datumend' => '1996-12-31 12:00:00',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            1 => array(
                'title' => 'Studium Mediadesigner / Mediadesign Akademie München',
                'desc' => '4 Semster jeweils digitale Medien jeweils von analog zu digital.',
                'datumstart' => '1997-01-01 12:00:00',
                'datumend' => '1998-12-31 12:00:00',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            2 => array(
                'title' => 'Senior Online Producer / MTV Networks',
                'desc' => 'xxx',
                'datumstart' => '2017-03-09 03:51:05',
                'datumend' => '2017-12-31 03:51:05',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
        ));
    }
}
