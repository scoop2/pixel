<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $items = DB::table('pages')->where('meta_description', 'home')->first();
        if (Auth::check()) {
            $items->username = $user['name'];
            $items->check = '(Logged in!)';
        } else {
            $items->username = 'werter Gast';
        }
        $teaser = DB::table('sets')->where([['promo', '=', '1'], ['active', '=', '1']])->orderBy('released', 'desc')->take(2)->get();
        if (!$teaser->isEmpty()) {
            for ($i = 0; $i < 2; $i++) {
                $tags = DB::table('tags_sets')->where('setid', $teaser[$i]->id)->orderBy('rate')->get();
                $label = [];
                foreach ($tags as $tag) {
                    $labels = DB::table('tags')->where('id', $tag->id)->first();
                    array_push($label, $labels->title);
                }
                $teaser[$i]->label = $label;
                $teaser[$i]->released = Helper::convertRelease($teaser[$i]->released);
            }
        }

        return view('home', ['items' => $items, 'user' => $user, 'teaser' => $teaser]);
    }

    public function impressum()
    {
        return view('impressum');
    }
}
