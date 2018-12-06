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
                'body' => '<p>Ich bezeichne mich als FrontendWebEntwickler und verstehe darunter jemanden der sich um alles kümmert was der Benutzer sieht, hört und verwendet. Da ich schon seit den 90er Jahren in diesem Bereich tätig bin kann ich ein Lied davon singen wie vielseitig die Aufgaben sein müssen. Moderne Webentwicklung ist so komplex geworden das eine Spezialisierung dringend Notwendig ist. Ich schreibe dies da ich oft für Aufgaben angeworben werde die klar dem Backend zugeordnet werden können und dies ist nicht die Welt für die Mein Herz schlägt - es schlägt für Farben und Formen. Auch ein Frontendentwickler benötigt in diesen Tagen immer noch ein tiefes Verständnis für Programmierung und dieses bringe ich sicher mit. Ich freue mich aber über eine gelungene Farbpalette, ein akzeptiertes Layout, ein schön animiertes Webelement, einen Kunde der mit einem Lächeln die Oberfläche bedient um ein vielfaches mehr als über eine genialen Code.<br>Ich liebe Teamarbeit wo jeder das was er am besten kann zum Ganzen beifügt, wenn jeder auch das Leid des anderen versteht und dieses sogar helfen kann zu lindern ist es perfekt. Deshalb und trotz guten Programmierkenntnissen lege ich wert auf die Bezeichnung "Frontend".</p>',
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
