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
        $promo = DB::table('sets')->where([['promo', '=', '1'], ['active', '=', '1']])->orderBy('released', 'asc')->first();
        if (empty($promo)) {
            $promo = DB::table('sets')->where('active', '=', '1')->orderBy('released', 'desc')->get();
            $promo = $promo[0];
        }
        if (!empty($promo)) {
            $tags = DB::table('tags_sets')->where('setid', $promo->id)->orderBy('rate')->get();
            $chart = [];
            $label = [];
            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate', [$promo->id]);
            foreach ($tags as $tag) {
                $labels = DB::table('tags')->where('id', $tag->tag)->first();
                array_push($chart, $tag->rate);
                array_push($label, $labels->title);
            }
            $promo->label = $label;
            $promo->chart = $chart;
            $promo->released = Helper::convertRelease($promo->released);
        }

        $teaser = DB::table('sets')->where([['promo', '=', '0'], ['active', '=', '1'], ['id', '<>', $promo->id]])->orderBy('clicks', 'asc')->first();
        if (!empty($teaser)) {
            $tags = DB::table('tags_sets')->where('setid', $teaser->id)->orderBy('rate')->get();
            $chart = [];
            $label = [];
            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate', [$teaser->id]);
            foreach ($tags as $tag) {
                $labels = DB::table('tags')->where('id', $tag->tag)->first();
                array_push($chart, $tag->rate);
                array_push($label, $labels->title);
            }
            $teaser->label = $label;
            $teaser->chart = $chart;
            $teaser->released = Helper::convertRelease($teaser->released);
        }

        return view('home', ['items' => $items, 'user' => $user, 'teaser' => $teaser, 'promo' => $promo]);
    }

    public function impressum()
    {
        $user = Auth::user();
        return view('impressum');
    }

    public function festival()
    {
        $user = Auth::user();
        $desc = DB::table('pages')->where('meta_description', 'festival')->get();
        return view('festival', ['item' => $desc, 'user' => $user]);
    }
}
