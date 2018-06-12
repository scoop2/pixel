<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use App\Skills;
use App\Skillscats;

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
            $i ++;
        }
        
        return view('skills', [
            'skillcats' => $cats,
            'skillitem' => $skills,
            'desc' => $desc
        ]);
    }
}
