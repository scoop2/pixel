<?php
namespace App\Http\Controllers;

use Helper;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function sets($responsive = 'desk', $id = 0)
    {
        if ($id == 0) {
            $desc = DB::select('SELECT * FROM sets WHERE active = ? ORDER BY released', [1]);
        } else {
            $desc = DB::select('SELECT * FROM sets WHERE active = ? AND id = ?', [1, $id]);
        }
        return response()->json($desc);
    }

    public function click($responsive = 'desk', $id = 0)
    {
        DB::table('sets')->where('id', $id)->increment('clicks');
        return response()->json(true);
    }

    public function filter($responsive = 'desk', $filter = 0)
    {
        $response = [];
        $results = [];
        $found = [];
        $respSets = [];
        $response = [];
        $maxSets = 8;
        $count = 0;

        $req = preg_match('^[0-9]{1,2}([,.][0-9]{1,2})?$^', $filter);

        if ($req == 1) {
            $tags = explode("-", $filter);
            foreach ($tags as $tag) {
                $tag = explode(":", $tag);
                $tag[0] = intval($tag[0]);
                $tag[1] = intval($tag[1]);
                if ($tag[1] > 0) {
                    $sets = DB::select('SELECT * FROM tags_sets WHERE tag = ? ORDER BY rate DESC', [$tag[0]]);
                    $tmp = new tagBags();
                    $tmp->tag = $tag[0];
                    $tmp->userRate = $tag[1];
                    $tmp->sets = $sets;
                    array_push($results, $tmp);
                }
            }
            usort($results, function ($first, $second) {
                return $first->userRate < $second->userRate;
            });
        }

        foreach ($results as $result) {
            if (empty($result->sets)) {
                continue;
            } else {
                foreach ($result->sets as $resp) {
                    if (!in_array($resp->setid, $found)) {
                        array_push($found, $resp->setid);
                        array_push($respSets, $resp);
                    }
                }
            }
        }

        foreach ($respSets as $respSet) {
            $chart = [];
            $label = [];
            $newset = DB::select('SELECT * FROM sets WHERE id = ?', [$respSet->setid]);
            $newset[0]->playlist = DB::select('SELECT * FROM playlists WHERE set_id = ? ORDER BY position', [$respSet->setid]);
            if (empty($newset[0]->playlist)) {
                $newset[0]->playlist = false;
            }

            $tags = DB::select('SELECT * FROM tags_sets WHERE setid = ? ORDER BY rate DESC', [$respSet->setid]);
            foreach ($tags as $tag) {
                $labels = DB::table('tags')->where('id', $tag->tag)->first();
                array_push($chart, $tag->rate);
                array_push($label, $labels->title);
            }
            $newset[0]->chartdata = $chart;
            $newset[0]->chartlabel = $label;
            array_push($response, $newset);
            $count++;
            if ($count >= $maxSets) {
                break;
            }

        }

        foreach ($response as $tmp) {
            $tmp[0]->released = Helper::convertRelease($tmp[0]->released);
        }

        return response()->json($response);
    }

}

class tagBags
{
    public function tagBags()
    {
        $this->sets = [];
        $this->tag = 0;
        $this->userRate = 0;
    }
}
