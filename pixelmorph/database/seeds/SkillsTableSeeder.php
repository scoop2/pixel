<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('skills')->delete();
        DB::table('skills')->insert(array(
            0 => array(
                'active' => 1,
                'title' => 'HTML5',
                'description' => 'Schlafwandlerisch und browserübergreifend schreibe ich HTML freihand und W3C konform. Gewöhnlich mache ich die Qualitätssicherung mit Chrome, Firefox und Safari. Hier sind auch ähnlich umschreibende Sprachtypen zu erwähnen wie z.B. XML oder XSL.',
                'skillscats_id' => 2,
                'perc' => 100,
                'icon' => 'fab fa-html5',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            1 => array(
                'active' => 1,
                'title' => 'CSS3',
                'description' => 'Der großen Komplexität geschuldet gerade was browserübergreifende Themen betrifft will ich mich nicht als perfekt bezeichnen. Es gab aber bisher nur sehr wenige Probleme die ich nicht irgendwie zufriedenstellend lösen konnte. CSS ist das wichtigste Werkzeug eines Frontendentwicklers und somit mein absolutes Kernthema.',
                'skillscats_id' => 2,
                'perc' => 95,
                'icon' => 'fab fa-css3',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            2 => array(
                'active' => 1,
                'title' => 'SVG',
                'description' => 'Ich erachte SVG wichtiger als es z.Z. weltweit Verwendung findet. Ich habe mich auch etwas in die Programmierung eingearbeitet um komplexere SVGs und etwas Animation in der Griff zu bekommen. Mein routinierter Umgang mit SVG Programmen wie Illustrator oder Inkscape helfen hier sehr.',
                'skillscats_id' => 2,
                'perc' => 70,
                'icon' => '',
                'image' => 'svg.svg',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            3 => array(
                'active' => 1,
                'title' => 'Sass',
                'description' => 'Für mich ist der CSS Preprozessor nicht mehr weg zu denken. Beim Hickhack um Sass oder Less habe ich mich ich auf die Sass Seite geschlagen, kenne mich aber auch mit Less aus und kann sogar Stylus.',
                'skillscats_id' => 2,
                'perc' => 90,
                'icon' => 'fab fa-sass',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            4 => array(
                'active' => 1,
                'title' => 'Javascript',
                'description' => 'Über die Jahre bin ich auch mit Vanilla Javascript vertraut geworden, bevorzuge aber Frameworks. Für die üblichen Bedürfnisse gerade was das Erweitern der GUI betrifft reicht es auf jeden Fall, Aufgaben die diesen Rahmen sprengen würde ich an die Informatiker weiter reichen.',
                'skillscats_id' => 2,
                'perc' => 75,
                'icon' => 'fab fa-js-square',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            5 => array(
                'active' => 1,
                'title' => 'SEO',
                'description' => 'Für Ranking etc. gibt es SEO-Experten - der bin ich nicht. Doch gutes SEO beginnt schon im Quellcode. Gut programmierte Webseiten mit Aspekt auf SEO machen den SEO-Experten glücklich so das ich tiefgreifend informiert bin was meinen Bereich betrifft.',
                'skillscats_id' => 2,
                'perc' => 70,
                'icon' => '',
                'image' => 'seo.svg',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            6 => array(
                'active' => 1,
                'title' => 'Materialize',
                'description' => 'Nach sehr umfangreicher Recherche für das optimale CSS Framework kam ich zu der Erkenntnis das es sowas nicht gibt. Für meine bisherigen Bedürfnisse war Materialize das geeignetste. Ich habe auch schon viele Andere verwendet (Polymer, Bootstrap, Vuetify ...) und bin schnell eingearbeitet wenn ein neues verwendet werden soll.',
                'skillscats_id' => 3,
                'perc' => 100,
                'icon' => '',
                'image' => 'materialize.svg',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            7 => array(
                'active' => 1,
                'title' => 'Foundation',
                'description' => 'Foundation verwende ich wenn Design eine untergeordnete Rolle spielt aber kein Werkzeug fehlen sollte. Leider ist das Design in die Jahre gekommen und nicht nach meinem Geschmack.',
                'skillscats_id' => 3,
                'perc' => 50,
                'icon' => '',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            8 => array(
                'active' => 1,
                'title' => 'Quasar',
                'description' => 'Bei Vue sind Webkomponenten nicht Teil sondern Basis des Konzepts, Quasar führt die logische Konequenz ein CSS Framework für Webkomponenten zu liefern am überzeugensten weiter.',
                'skillscats_id' => 3,
                'perc' => 40,
                'icon' => '',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            9 => array(
                'active' => 1,
                'title' => 'jQuery',
                'description' => 'jQuery wird zwar immer unwichtiger, für Eventhandling und komplexe Aufgaben ist es immernoch mein Favorit. Es hilft Teams Code aufgeräumter/verständlicher zu präsentieren und Lösungen zu vereinheitlichen. Ich sehe es als Vorstufe zur Wahl eines richtigen JS Framework. Seit vielen Jahre setze ich es ein und bin dementsprechend grün damit.',
                'skillscats_id' => 4,
                'perc' => 85,
                'icon' => '',
                'image' => 'jquery.svg',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            10 => array(
                'active' => 1,
                'title' => 'Vue',
                'description' => 'Nach sehr langen und intensiven Suche ist Vue das JS Framework meiner Wahl und ich besitze entsprechned damit am meisten Erfahrung. Das einzige JS Framework mit dem ich eingesetzte Apps entwickelt habe.',
                'skillscats_id' => 4,
                'perc' => 65,
                'icon' => 'fab fa-vuejs',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            11 => array(
                'active' => 1,
                'title' => 'Angular',
                'description' => 'Über das Heroes Tutorial bin ich nicht hinausgekommen. Sollte ich es einsetzen müssen werden sicher einige Monaten Grundlagenforschung notwendig.',
                'skillscats_id' => 4,
                'perc' => 30,
                'icon' => 'fab fa-angular',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            12 => array(
                'active' => 1,
                'title' => 'Ember',
                'description' => 'Für mich ist es einer der besten und entsprechend enthuisatisch habe ich mich damit beschäftigt. Eingesetzt habe ich es leider noch nicht.',
                'skillscats_id' => 4,
                'perc' => 35,
                'icon' => 'fab fa-ember',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            13 => array(
                'active' => 1,
                'title' => 'React',
                'description' => 'Auch React habe ich noch nicht eingesetzt, meine Übungen haben mir aber mehr Spass bereitet als mit Angular und gerne bin ich bereit damit auch hauptsächlich zu arbeiten.',
                'skillscats_id' => 4,
                'perc' => 25,
                'icon' => 'fab fa-react',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            14 => array(
                'active' => 1,
                'title' => 'Node',
                'description' => 'Für effektive Frontendentwicklung bietet Node.js gute Dienste. Ich habe mich deshalb damit arrangiert was das Erstellen von Entwicklungsumgebungen betrifft. Dazu verwende ich NPM.',
                'skillscats_id' => 4,
                'perc' => 30,
                'icon' => 'fab fa-node-js',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            15 => array(
                'active' => 1,
                'title' => 'Gulp',
                'description' => 'Für meine Entwicklungsumgebung verwende ich Gulp am liebsten und kenne mich gut aus mit Gulptasks und Pipes. Grunt kenne ich nur von der Theorie.',
                'skillscats_id' => 4,
                'perc' => 40,
                'icon' => 'fab fa-gulp',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            16 => array(
                'active' => 1,
                'title' => 'Webpack',
                'description' => 'Da Vue nur mit Webpack Sinn macht kenne ich mich ausreichend aus um Buildprozesse zu erstellen. Vieles im Detail bleibt aber immer noch ein Rätzel.',
                'skillscats_id' => 4,
                'perc' => 35,
                'icon' => '',
                'image' => 'webpack.svg',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            17 => array(
                'active' => 1,
                'title' => 'Docker',
                'description' => 'Für größere Teams die vor allem ortsungebunden arbeiten und unterschiedliche IT-Infrastruckturen verwenden müssen könnte Docker die Lösung der durch solche Umstände entstehenden Probleme sein. In der Praxis habe ich keine Erfahrung mit Docker gemacht, ich glaube aber an diese Technologie und arbeite mich in meiner Freizeit immer ein Stückchen weiter ein.',
                'skillscats_id' => 4,
                'perc' => 15,
                'icon' => 'fab fa-docker',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            18 => array(
                'active' => 1,
                'title' => 'Wordpress, Joomla!, Drupal und Voyager',
                'description' => 'Ich habe schon lange kein CMS mehr verwendet da firmeneigene Lösungen zum Einsatz kamen und besitze mit den oben genannten am meisten Erfahrung. Auch diese Webseite besitzt kein CMS sonder ein inovatives System (Voyager) das auf CRUD bzw. BREAD Operationen basiert. Berührungsängste mit CMS jeglicher Couleur habe ich sicher nicht. Eine Ausnahme wäre Magento :)',
                'skillscats_id' => 5,
                'perc' => 70,
                'icon' => 'fab fa-wordpress',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            19 => array(
                'active' => 1,
                'title' => 'PHP7',
                'description' => 'Ich beschäftige mich mit PHP seit Version 3 und bin dementsprechend vertraut mit obejktorientierter Programmierung. Auch wenn ich schon unzählige Sachen mit PHP realisiert habe zähle ich mich nicht als Programmierer. Da ich mich so gut mit PHP auskenne bin ich der perfekte Frontendentwickler für Teams die mit PHP Backends entwickeln. Ich werde schnell verstehen wie sie funktionieren und was ich zu tun habe um Content sichtbar zu machen. Auch modulare Apps in solchen Systemen sollten kein Problem für mich sein wenn der Nerd bei Bedarf die notwendige Hilfestellung leistet.',
                'skillscats_id' => 6,
                'perc' => 80,
                'icon' => 'fab fa-php',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            20 => array(
                'active' => 1,
                'title' => 'ASP',
                'description' => '2017/18 habe ich ausschließlich für ASP.net basierte Webseiten entwickelt. Das MVC Prinzip liegt mir seit jeher im Blut und als Frontendentwickler hatte ich natürlich meinen Fokus auf das V (Razor) gelegt. Für das MC fühle ich mich nicht zuständig. Ich verstehe meistens was dort passiert schreibe es aber nicht selber.',
                'skillscats_id' => 6,
                'perc' => 45,
                'icon' => '',
                'image' => 'visual-studio.svg',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            21 => array(
                'active' => 1,
                'title' => 'Ruby',
                'description' => '2013 durfte ich an einem umfangreichen Ruby on Rails Projekt teilhaben und war hellauf begeistert. Dementsprechend lernte ich auch Ruby. Da dies nun einige Zeit her ist zähle ich dies nicht mehr zu meinen nützlichen Skills, doch für eine Rückkehr bin ich stets offen.',
                'skillscats_id' => 6,
                'perc' => 25,
                'icon' => '',
                'image' => 'ruby.svg',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            22 => array(
                'active' => 1,
                'title' => 'MySQL',
                'description' => 'MySQL ist die einzige Datenbank die ich tiefgreifend kennen gelernt habe. Wichtig zu erwähnen ist vor allem die notwendige Achtsamkeit für resourcenschonende Querries und sicherheistrelevante Aspekte. Andere Datenbanken kenne ich nur über Abstraktionsebenen und will sie auch nicht weiter kennen lernen.',
                'skillscats_id' => 6,
                'perc' => 65,
                'icon' => '',
                'image' => 'mysql.svg',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            23 => array(
                'active' => 1,
                'title' => 'Git, TFS, SVN',
                'description' => 'Am liebsten arbeite ich mit Git, auch über Konsole. In TFS bin routiniert, aber nur über Visiual Studio. Bei SVN bin ich eingerostet und kenne es nur über Konsole. Der Umgang mit Tortoise ist mir geläufig.',
                'skillscats_id' => 6,
                'perc' => 70,
                'icon' => 'fab fa-github-square',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            24 => array(
                'active' => 1,
                'title' => 'Laravel',
                'description' => 'Um an PHP nicht den Anschluß zu verlieren habe ich mich intensiv mit Laravel befaßt und arbeite z.Z. sehr viel damit. Mit Routing, Controller und Views bin ich gut vertraut, spezielle Aufgaben bewältige ich mit Hilfe von Podcasts u.ä..',
                'skillscats_id' => 7,
                'perc' => 70,
                'icon' => 'fab fa-laravel',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            25 => array(
                'active' => 1,
                'title' => 'Yii2',
                'description' => 'Seit 2 Jahren beschäftige ich mich nur noch mit Laravel. Die beiden sind sich doch recht ähnlich und es dürfte nicht lange dauern bis ich mit Yii2 warm werde. Den Vorgänger meiner Webseite habe ich damit umgesetzt, sowie eine Mockup Prototypen für einen Kunden.',
                'skillscats_id' => 7,
                'perc' => 50,
                'icon' => '',
                'image' => 'yii.svg',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            26 => array(
                'active' => 1,
                'title' => 'GUI',
                'description' => 'Die Schnittstelle zwischen Mensch und Maschine ist das was mich am meisten interessiert. Ich befasse mich mit Wirkung und Psychologie von Farben und Formen. Das erarbeiten von GUIs ist genau mein Ding, hier bin ich zuhause. Kleinste Details sind mir wichtig. Durch mein Design orientiertes Studium und viel Praxis in Zusammenarbeit mit Designern bin ich das pixelgneaue arbeiten gewohnt und besitze die notwendige Awareness die man bei so manchen Programmierer vermissen wird :)',
                'skillscats_id' => 8,
                'perc' => 100,
                'icon' => 'fas fa-tv',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            27 => array(
                'active' => 1,
                'title' => 'Fotografie',
                'description' => 'Während meines Studiums durfte ich auch ein Fotoseminar genießen und lernte alles über Blenden und Belichtungszeiten. Photoshop und Illustrator sind bis heute für mich wichtige Programme geblieben und ihre professionelle Verwendung schon sehr lange Normalität. In Zeiten von Flat-Material-Design kaum noch gebraucht, aber der Skill anspruchsvolle Grafiken zu erstellen ist nach wie vor vorhanden und wird weiterhin gepflegt.',
                'skillscats_id' => 8,
                'perc' => 70,
                'icon' => 'fas fa-camera-retro',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
            28 => array(
                'active' => 1,
                'title' => 'Malen & Zeichnen, Layout, Farbenlehre',
                'description' => 'Der analoge Umgange mit Pinsel, Feder und Stift war Bestand meines Studiums. Von Aktmalerei bis zum Farbkreis. Auch privat male ich gerne. Für einen Illustrator reicht mein Talent leider nicht.',
                'skillscats_id' => 8,
                'perc' => 90,
                'icon' => 'fas fa-palette',
                'image' => '',
                'created_at' => '2017-09-09 03:51:05',
                'updated_at' => '2017-09-09 03:51:05',
            ),
        ));
    }
}
