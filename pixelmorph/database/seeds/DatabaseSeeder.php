<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(SkillscatsTableSeeder::class);
//        $this->call(SetsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
//        $this->call(TagsSetsTableSeeder::class);
        $this->call(WgUsersTableSeeder::class);
        $this->call(PlaylistsTableSeeder::class);
        $this->call(VitaTableSeeder::class);
        $this->call(PersosTableSeeder::class);

        DB::unprepared(url('/pixelmorph/database/dump/sets.sql'));

    }
}
