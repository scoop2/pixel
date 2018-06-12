<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function sets($id = 0)
    {
      if ($id == 0) {
         $desc = DB::select('SELECT * FROM sets WHERE active = ? ORDER BY released', [1]);
      } else {
         $desc = DB::select('SELECT * FROM sets WHERE active = ? AND id = ?', [1, $id]);
      }
      return response()->json($desc);
    }

    public function filter($filter = 0) {
      $response = [];
      $results = [];
      $found = [];
      $respSets = [];
      $response = [];

      $req = preg_match('^[0-9]{1,2}([,.][0-9]{1,2})?$^', $filter);

      if ($req == 1) {
        $tags = explode(".", $filter);

        foreach ($tags as $tag) {
          $tag = explode(":", $tag);     
          $tag[0] = intval($tag[0]);
          $tag[1] = intval($tag[1]);
          $sets = DB::select('SELECT * FROM tags_sets WHERE tag = ? ORDER BY rate DESC', [$tag[0]]);
          
          $tmp = new tagBags();
          $tmp->tag = $tag[0];
          $tmp->userRate = $tag[1];
          $tmp->sets = $sets;

          array_push($results, $tmp);
        }
        usort($results, function($first,$second){
          return $first->userRate < $second->userRate;
        });
      }

      foreach ($results as $result) {
        if (empty($result->sets)) {
          continue;
        } else {
          foreach ($result->sets as $resp) {
            if (!in_array($resp->set, $found)) {
              array_push($found, $resp->set);
              array_push($respSets, $resp);
            }
          }
        }
      }

      foreach ($respSets as $respSet) {
        array_push($response, DB::select('SELECT * FROM sets WHERE id = ?', [$respSet->set]));
      }

      /*
echo "result<pre>";
echo var_dump($response);
echo "</pre><hr>";
exit;
*/

    return response()->json($response);
  }
}

class tagBags {
  public function tagBags()
  {
    $this->sets = [];
    $this->tag = 0;;
    $this->userRate = 0;
  }
}