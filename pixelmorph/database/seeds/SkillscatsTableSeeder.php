<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillscatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('skillscats')->delete();
        DB::table('skillscats')->insert(array(
            0 => array(
                // 'id' => 1,
                'title' => 'cat1',
                'skillscats_id' => 1,
                'created_at' => '2017-09-09 04:43:00',
                'updated_at' => '2017-09-09 04:44:19',
                'active' => 1,
                'description' => 'aa'
            ),
            1 => array(
                // 'id' => 2,
                'title' => 'cat2',
                'skillscats_id' => 2,
                'created_at' => '2017-09-09 04:44:04',
                'updated_at' => '2017-09-09 04:44:04',
                'active' => 1,
                'description' => 'bbbb'
            )
        ));
    }
}