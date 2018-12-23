<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('pages')->delete();
        DB::table('pages')->insert(array(
            0 => array(
                'status' => 1,
                'author' => 1,
                'title' => 'Home',
                'headline' => 'Willkommen',
                'body' => '<p>Ein Angler braucht eine Angel, ein Schachspieler ein Schachbrett und ein Webentwickler eine Webseite. Dies ist der einzige Grund warum es diese Seite gibt ... mein Spielplatz.<br>Hast Du - warum auch immer - Bedarf an einen Internetspezialisten werfe einen Blick auf die <a href="/skills">Skills</a> und entscheide ob ich Dir behilflich sein kann. Ich helfe nicht nur aus kommerziellen Interesse. Hast Du eine Idee welche die Welt besser oder einfach nur schöner machen würden kann man mich leicht beigeistern. Ist Dir das studieren der Skills zu technisch, <a href="/kontakt">kontaktiere</a> mich einfach.</p><p>Als Freund der elektronischen Unterhaltungsmusik könnten <a href="/sound">hier</a> einige akustische Überraschungen auf dich warten. Dort findest Du einige Sets mit eleketronischer Musik verschiedenster Art. Vornehmlich Sachen zum grooven, zum entspannten Tanzen und treiben lassen oder einfach nur zum Träumen und wohl fühlen. Da ich nicht glaube das man elektronische Musik in Schubladen wie Techno oder Trance aufräumen kann, kannst Du Deine Musik durch das Einstellen von sogenannten Moods aussuchen, probier es einfach mal aus :)</p>',
                'meta_description' => 'home',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            1 => array(
                'status' => 1,
                'author' => 1,
                'title' => 'Skills',
                'headline' => 'Skills',
                'body' => '<p>Ich bezeichne mich als FrontendWebEntwickler und verstehe darunter jemanden der sich um alles kümmert was der Benutzer sieht, hört und verwendet. Da ich schon seit den 90er Jahren in diesem Bereich tätig bin kann ich ein Lied davon singen wie vielseitig die Aufgaben sein müssen. Moderne Webentwicklung ist so komplex geworden das eine Spezialisierung dringend Notwendig ist.<br>Ich schreibe dies da ich oft für Aufgaben angeworben werde die klar dem Backend zugeordnet werden können und dies ist nicht die Welt für die Mein Herz schlägt - es schlägt für Farben und Formen. Auch ein Frontendentwickler benötigt in diesen Tagen immer noch ein tiefes Verständnis für Programmierung und dieses bringe ich sicher mit. Ich freue mich aber über eine gelungene Farbpalette, ein akzeptiertes Layout, ein schön animiertes Webelement, einen Kunde der mit einem Lächeln die Oberfläche bedient um ein vielfaches mehr als über eine genialen Code.<br>Ich liebe Teamarbeit wo jeder das was er am besten kann zum Ganzen beifügt, wenn jeder auch das Leid des anderen versteht und dieses sogar helfen kann zu lindern ist es perfekt. Deshalb und trotz guten Programmierkenntnissen lege ich wert auf die Bezeichnung "Frontend".</p>',
                'meta_description' => 'skills',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            2 => array(
                'status' => 1,
                'author' => 1,
                'title' => 'Login',
                'headline' => 'Login',
                'body' => '<p>Bitte einloggen ...</p>',
                'meta_description' => 'login',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            3 => array(
                'status' => 1,
                'author' => 1,
                'title' => 'Sets',
                'headline' => 'LoSetsgin',
                'body' => '<p>Das klassische Einsortieren in Genres erschien mir immer sinnlos, denn was ist schon Bassline, Trap oder wer alles weiß was Leftfield sein soll? Auch wenn ich eine genaue Vorstellung hatte was mich in dem Genre erwarten wird hat mir das nur selten weiter geholfen denn das was z.B. alles unter Techno einosrtiert wird ist meist nicht falsch plaziert, aber die Menge von dem was dort dann alles angeboten wird ist unüberschaubar.<br>Deshalb habe ich mir ein eigenes Tagging ausgedacht das sich an Stimmungen (sog. Moods) orientiert. Stelle die Regler so ein wie Deine Stimmung ist und was Du gerne hören willst. Melodiös - auf jeden Fall und bitte etwas progressiv, aber nicht zu hart ... in etwa so :)</p><br>Natürlich bewegt sich das ganze in meinem Geschmacksumfeld. Wer viel Hardbeat wählt wird schon was auf die Ohren bekommen aber das was in den üblichen Genres unter Hardstyle oder so gehandelt wird kommt bei mir sicher nicht zum vorschein. Also das System könnte trotzdem böse floppen weil ich einfach nicht der richtige DJ für Dich bin ^^.',
                'meta_description' => 'sets',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
        ));
    }
}
