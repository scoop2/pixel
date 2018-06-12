<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Pages;

class SetsController extends Controller
{

    public function index($filter = '')
    {
        $desc = Pages::where('status', 'ACTIVE')->where('title', 'Sets')->first();
        
        $i = 1;
        if ($filter != '') {
            $and = ' AND id IN (';
            $sets = explode(':', $filter);
            foreach ($sets as $set) {
                $and .= $set;
                if (count($sets) > $i) $and .= ',';
                $i++;
            }
            $and .= ')';
        } else {
            $and = '';
        }

        $i = 0;
        $items = DB::select('SELECT * FROM sets WHERE active = ? '.$and.' ORDER BY setorder LIMIT 10', [1]);
        $taglist = DB::select('SELECT * FROM tags ORDER BY title');
        $thetag = "";
        $count = 1;
        $rateTotal = 0;
        $widthTotal = 0;
        $htmltags = [];
        $rate = [];
        $month = ['', 'Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'];

        foreach ($items as $i => $item) {
            $items[$i]->released = $month[date("n", strtotime($items[$i]->released))] . '|' . date("y", strtotime($items[$i]->released));
            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate', [$items[$i]->id]);
            foreach ($tags as $tag) {
                $rateTotal += $tag->rate;
                $thetag = DB::table('tags')->where('id', $tag->tag)->orderBy('title')->first();
                $tmp = new tagBag();
                $tmp->title = $thetag->title;
                $tmp->rate = $tag->rate;
                array_push($htmltags, $tmp);
            }
            $html = "";
            $quote = 100 / $rateTotal;
            foreach ($htmltags as $htmltag) {
                $htmltag->width = round($quote * $htmltag->rate);
                $widthTotal += $htmltag->width;
            }
            $div = 100 - $widthTotal;
            if ($div > 0) {
                $htmltags[count($htmltags) - 1]->width = $htmltags[count($htmltags) - 1]->width + $div;
            } elseif ($div < 0) {
                $htmltags[count($htmltags) - 1]->width = $htmltags[count($htmltags) - 1]->width - $div;
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
            $rateTotal = 0;
            $widthTotal = 0;
            $count = 1;
            $items[$i]->tags = $html;
        }
        $i++;
        return view('sets')->with('items', $items)->with('all', $i)->with('tags', $taglist)->with('desc', $desc);
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
