<?php
namespace App\Http\Controllers;

use App\Pages;
use Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SoundController extends Controller
{

    public function index($responsive = 'desk', $filter = '')
    {
        if (!Auth::check()) {
            $user = false;
        } else {
            $user = true;
        }
        $desc = Pages::where('status', '1')->where('title', 'Sets')->first();

        $i = 1;
        if ($filter != '') {
            $and = ' AND id IN (';
            $sets = explode(':', $filter);
            foreach ($sets as $set) {
                $and .= $set;
                if (count($sets) > $i) {
                    $and .= ',';
                }
                $i++;
            }
            $and .= ')';
        } else {
            $and = '';
        }

        $items = DB::select('SELECT * FROM sets WHERE active = ? ' . $and . ' ORDER BY released LIMIT 5', [1]);
        $taglist = DB::select('SELECT * FROM tags ORDER BY title');
        $chart = [];
        $label = [];
        $playlists = [];
        $playlist = "";

        foreach ($items as $i => $item) {
            $items[$i]->released = Helper::convertRelease($items[$i]->released);
            $playlist = DB::select('SELECT * FROM playlists WHERE set_id = ? ORDER BY position', [$items[$i]->id]);
            if (empty($playlist)) {
                $playlist = false;
            }
            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate', [$items[$i]->id]);
            foreach ($tags as $tag) {
                $labels = DB::table('tags')->where('id', $tag->tag)->first();
                array_push($chart, $tag->rate);
                array_push($label, $labels->title);
            }
            $items[$i]->chart = $chart;
            $items[$i]->label = $label;
            $items[$i]->playlist = $playlist;
        }

        if ($responsive == 'desk') {
            return view('desk.sound', [
                'responsive' => $responsive,
                'items' => $items,
                'tags' => $taglist,
                'desc' => $desc,
                'user' => $user,
            ]);
        } elseif ($responsive == 'mobile') {
            return view('mobile.sound', [
                'responsive' => $responsive,
                'items' => $items,
                'tags' => $taglist,
                'desc' => $desc,
                'user' => $user,
            ]);
        }
    }
}

class tagBag
{
    public function tagBag()
    {
        $this->title = "";
        $this->rate = "";
        $this->width = "";
    }
}
