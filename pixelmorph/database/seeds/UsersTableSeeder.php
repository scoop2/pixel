<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(array(
            0 => array(
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(60),
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
        ));
    }
}
