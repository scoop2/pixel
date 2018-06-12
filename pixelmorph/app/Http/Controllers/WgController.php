<?php
namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Model;
use App\Wgprofile;
use App\Wguser;

class WgController extends Controller
{

    public function index($id = null)
    {
        if ($id === null) {
            return redirect()->action('HomeController@index');
        } else {
            $visitor = Wguser::where('wg_gesucht_id', intval($id))->first();
            // echo " <pre>";
            // echo var_dump($visitor);
            // / echo "</pre>";

            if (!$visitor->profiles) {
                return redirect()->action('HomeController@index');
            } else {
                $items = explode(',', $visitor->profiles);
                // echo $visitor->profiles;

                foreach ($items as $item) {
                    $profiles[] = Wgprofile::where('id', $item)->first();
                }
                // echo var_dump($profiles);
                foreach ($profiles as $profile) {
                    // echo var_dump($profile);
                }
                return view('wg', ['profiles' => $profiles]);
            }
        }
    }

    public function show($id)
    {

        // $items = $id;
        echo var_dump($id);
        exit();
        // return view('wg')->with('items', $items);
    }
}
