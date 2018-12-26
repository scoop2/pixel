<?php
namespace App\Http\Controllers;

use App\Pages;
use App\Persos;
use App\Skills;
use App\Skillscats;
use App\Vita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\models\Cats;
class SkillsController extends Controller
{

    public function index(Request $request)
    {
        if (!Auth::check()) {
            $user = false;
        } else {
            $user = true;
        }

        $desc = Pages::where('status', '1')->where('title', 'Skills')->first();
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
                if ($skill->icon != '') {
                    $cats[$i]['items'][$x]['icon'] = '<i class="' . $skill->icon . ' fa-3x"></i>';
                } else if ($skill->image != '') {
                    $cats[$i]['items'][$x]['icon'] = '<img src="'.url('/').'/images/logos/' . $skill->image . '"></img>';
                } else {
                    $cats[$i]['items'][$x]['icon'] = '';
                }
                $x++;
            }
            $i++;
        }

        return view('skills', [
            'skillcats' => $cats,
            'desc' => $desc,
            'user' => $user,
        ]);
    }

    public function vita(Request $request)
    {
        if (Auth::check()) {
            $logged = true;
        } else {
            $logged = false;
        }
        $vitas = Vita::all();
        $i = 0;
        foreach ($vitas as $vita) {
            $item[$i]['title'] = $vita->title;
            $item[$i]['start'] = substr($vita->datumstart, 0, 4);
            $item[$i]['end'] = substr($vita->datumend, 0, 4);
            $item[$i]['desc'] = $vita->desc;
            $i++;
        }

        return view('vita', ['items' => $item, 'user' => Auth::user()]);
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

        return view('person', ['items' => $items, 'user' => Auth::user()]);
    }
}
