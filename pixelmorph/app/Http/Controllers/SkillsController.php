<?php
namespace App\Http\Controllers;

use App\Pages;
use App\Skills;
use App\Skillscats;
use App\Vita;
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
            foreach ($skills as $skill) {
                $cats[$i]['items'][] = $skill->title;
            }
            $i++;
        }

        return view('skills', [
            'skillcats' => $cats,
            'skillitem' => $skills,
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
}
