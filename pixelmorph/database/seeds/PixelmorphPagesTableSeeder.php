<?php
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Page;
use Illuminate\Support\Facades\DB;

class PixelmorphPagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::firstOrNew([
            'slug' => 'hello-world'
        ]);

        DB::table('pages')->insert(array(
            0 => array(
                'author_id' => 0,
                'title' => 'Willkommen',
                'slug' => 'home',
                'excerpt' => 'Home',
                'body' => '<p>bla bla bla auf Pixelmorph</p>',
                'image' => '',
                'meta_description' => 'home',
                'meta_keywords' => 'home',
                'status' => 'ACTIVE'
            )
        ));

        DB::table('pages')->insert(array(
            0 => array(
                'author_id' => 0,
                'title' => 'Skills',
                'slug' => 'skills',
                'excerpt' => 'Skills',
                'body' => '<p>Text für Skills</p>',
                'image' => '',
                'meta_description' => 'skills',
                'meta_keywords' => 'skills',
                'status' => 'ACTIVE'
            )
        ));

        DB::table('pages')->insert(array(
            0 => array(
                'author_id' => 0,
                'title' => 'Login',
                'slug' => 'login',
                'excerpt' => 'login',
                'body' => '<p>Bitte einloggen</p>',
                'image' => '',
                'meta_description' => 'login',
                'meta_keywords' => 'login',
                'status' => 'ACTIVE'
            )
        ));

        DB::table('pages')->insert(array(
            0 => array(
                'author_id' => 0,
                'title' => 'Sets',
                'slug' => 'sets',
                'excerpt' => 'sets',
                'body' => '<p>Sets von erstarrendem Ambient bis anstrengende Experimentals. Das klassische Einsortieren in Genres erschien mir immer sinnlos, denn was ist schon Techno oder hat jemand schon mal was von Leftfield gehört? Deshalb habe ich mir ein eigenes Tagging ausgedacht das sich an Stimmungen (Moods) orientiert. Verwende den Filter (Lupeicon rechts) und gebe den Attributen Wertigkeiten um ein Set zu finden das deiner gesuchten Stimmung entspricht.</p>',
                'image' => '',
                'meta_description' => 'sets',
                'meta_keywords' => 'sets',
                'status' => 'ACTIVE'
            )
        ));
    }
}
