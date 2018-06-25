<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaylistsTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('playlists')->insert(array(
            0 => array(
                'set_id' => 1,
                'position' => 1,
                'title' => 'Mein Baum der Traum',
                'artist' => 'DJ Bobo',
                'mix' => 'Original Mix',
            ),
        ));

        DB::table('playlists')->insert(array(
            0 => array(
                'set_id' => 1,
                'position' => 2,
                'title' => 'Ibizia Saufparty',
                'artist' => 'DJ Ponk',
                'mix' => 'Original Mix',
            ),
        ));

        DB::table('playlists')->insert(array(
            0 => array(
                'set_id' => 1,
                'position' => 3,
                'title' => 'You Love Me',
                'artist' => 'Allstar',
                'mix' => 'DJ Bobo  Remix',
            ),
        ));

        DB::table('playlists')->insert(array(
            0 => array(
                'set_id' => 1,
                'position' => 4,
                'title' => 'Bla Blub Sabbel',
                'artist' => 'Quatscher',
                'mix' => 'Original Mix',
            ),
        ));

        DB::table('playlists')->insert(array(
            0 => array(
                'set_id' => 1,
                'position' => 5,
                'title' => 'Grosser Sieg',
                'artist' => 'Auch wenn du sagst',
                'mix' => 'Original Mix',
            ),
        ));

        DB::table('playlists')->insert(array(
            0 => array(
                'set_id' => 1,
                'position' => 6,
                'title' => 'Untergang',
                'artist' => 'Marsch',
                'mix' => 'Original Mix',
            ),
        ));

        DB::table('playlists')->insert(array(
            0 => array(
                'set_id' => 1,
                'position' => 6,
                'title' => 'Spiele und Bäder',
                'artist' => 'Rom',
                'mix' => 'Original Mix',
            ),
        ));
    }
}
