<?php
namespace App\Http\Controllers;

use App\Pages;
use App\Skills;
use App\Skillscats;
use App\Vita;
use App\Persos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// use App\models\Cats;
class SkillsController extends Controller
{

    public function index(Request $request)
    {
        $desc = Pages::where('status', 'ACTIVE')->where('title', 'Skills')->first();
        $skillcats = Skillscats::all()->where('active', 1);
        $i = 0;

        foreach ($skillcats as $skillcat) {
            $cats[$i]['title'] = $skillcat->title;
            $skills = Skills::all()->where('skillscats_id', $skillcat->skillscats_id)->where('active', 1);
            $x = 0;
            foreach ($skills as $skill) {
                $cats[$i]['items'][$x]['id'] = $skill->id;
                $cats[$i]['items'][$x]['title'] = $skill->title;
                $cats[$i]['items'][$x]['description'] = $skill->description;
                $cats[$i]['items'][$x]['perc'] = $skill->perc;
                $cats[$i]['items'][$x]['icon'] = $skill->icon;
                $x++;
            }
            $i++;
        }

        return view('skills', [
            'skillcats' => $cats,
            'desc' => $desc,
        ]);
    }

    public function vita(Request $request)
    {
        $vitas = Vita::all();
        $i = 0;
        foreach ($vitas as $vita) {
            $item[$i]['title'] = $vita->title;
            $item[$i]['start'] = substr($vita->datumstart, 0, 4);
            $item[$i]['end'] = substr($vita->datumend, 0, 4);
            $item[$i]['desc'] = $vita->desc;
            $i++;
        }

        return view('vita', ['items' => $item]);
    }

    public function person(Request $request)
    {
        $items = Persos::all()->where('id', 1);
        /*
        $i = 0;
        foreach ($vitas as $vita) {
            $item[$i]['title'] = $vita->title;
            $item[$i]['start'] = substr($vita->datumstart, 0, 4);
            $item[$i]['end'] = substr($vita->datumend, 0, 4);
            $item[$i]['desc'] = $vita->desc;
            $i++;
        }
        */

        return view('person', ['items' => $items]);
    }
}
