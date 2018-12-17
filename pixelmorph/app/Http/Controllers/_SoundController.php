<?php
namespace App\Http\Controllers;

use App\Pages;
use Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SoundController extends Controller
{

    public function index($filter = '')
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

        $i = 0;
        $items = DB::select('SELECT * FROM sets WHERE active = ? ' . $and . ' ORDER BY setorder LIMIT 10', [1]);
        $taglist = DB::select('SELECT * FROM tags ORDER BY title');
        $thetag = "";
        $count = 1;
        $rateTotal = 1;
        $widthTotal = 0;
        $htmltags = [];
        $rate = [];
        $playlists = [];
        $playlist = "";
        $month = ['', 'Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'];

        foreach ($items as $i => $item) {
            $items[$i]->released = Helper::convertRelease($items[$i]->released);
            $playlist = "<ul>";
            $playlistquery = DB::select('SELECT * FROM playlists WHERE set_id = ? ORDER BY position', [$items[$i]->id]);
            if (empty($playlistquery)) {
                $playlist .= '<li><div class="playlistitem"><p>Keine Playlist vorhanden</p></div></li></ul>';
            } else {
                foreach ($playlistquery as $playlistitem) {
                    $playlist .= '<li><div class="playlistitem"><b>' . $playlistitem->artist . '</b> - ' . $playlistitem->title . ' (' . $playlistitem->mix . ')</div></li>';
                }
            }
            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate', [$items[$i]->id]);
            if (empty($tags)) {
                $tags = [];
            }

            $rawTagdata = [];
            foreach ($tags as $tag) {
                $rateTotal += $tag->rate;
                $thetag = DB::table('tags')->where('id', $tag->tag)->orderBy('title')->first();
                $tmp = new tagBag();
                $tmp->title = $thetag->title;
                $tmp->rate = $tag->rate;
                array_push($htmltags, $tmp);
                array_push($rawTagdata, $tag->rate);
            }
            $html = "";
            $quote = 100 / $rateTotal;
            //  echo count($htmltags);
            //  exit;
            foreach ($htmltags as $htmltag) {
                $htmltag->width = round($quote * $htmltag->rate);
                $widthTotal += $htmltag->width;
            }
            $div = 100 - $widthTotal;
            if ($div > 0) {
                if (count($htmltags) >= 1) {
                    $htmltags[count($htmltags) - 1]->width = $htmltags[count($htmltags) - 1]->width + $div;
                }
            } elseif ($div < 0) {
                if (count($htmltags) >= 1) {
                    $htmltags[count($htmltags) - 1]->width = $htmltags[count($htmltags) - 1]->width - $div;
                }
            }
            foreach ($htmltags as $htmltag) {
                if (count($htmltags) <= $count) {
                    $end = 'end';
                } else {
                    $end = '';
                }
                $html .= '<div class="tag gradientTag' . $count . $end . '" style="width: ' . $htmltag->width . '%">' . $htmltag->title . '</div>';
                $count++;
            }
            $htmltags = [];
            $rateTotal = 1;
            $widthTotal = 0;
            $count = 1;
            $items[$i]->tags = $html;
            $items[$i]->playlist = $playlist;
        }
        $i++;

        return view('sound')
            ->with('items', $items)
            ->with('all', $i)
            ->with('tags', $taglist)
            ->with('rawTags', $rawTagdata)
            ->with('desc', $desc)
            ->with('user', $user);
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
