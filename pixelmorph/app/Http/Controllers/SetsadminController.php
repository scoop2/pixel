<?php
namespace App\Http\Controllers;

use Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SetsadminController extends Controller
{
    public function index($id = 0)
    {
        if (Auth::check()) {

            $menu = DB::select('SELECT id,title FROM sets ORDER BY released');

            if ($id != 0) {
                $desc = DB::select('SELECT * FROM sets WHERE active = ? ORDER BY released', [1]);
            }

            return view('setsadmin')->with('menu', $menu);
            //return view('setsadmin');
            /*
        echo "<pre>";
        echo var_dump($menu);
        echo "</pre>";
        exit;
         */
        } else {
            return view('auth.login');
        }
    }

    public function filter($filter = 0)
    {
        $response = [];
        $results = [];
        $found = [];
        $respSets = [];
        $response = [];

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
        /*
        echo "<pre>";
        echo var_dump($results);
        echo "</pre>";
        exit;
         */

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
            array_push($response, DB::select('SELECT * FROM sets WHERE id = ?', [$respSet->setid]));
        }
        foreach ($response as $tmp) {
            $tmp[0]->released = Helper::convertRelease($tmp[0]->released);
        }

        /*
        echo "<pre>";
        echo var_dump($response);
        echo "</pre><hr>";
        exit;
         */

        return response()->json($response);
    }

    public function playlist($playlist = 0)
    {
        //echo $playlist;
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
