<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

   public function index(Request $request)
   {
      // Get the currently authenticated user...
      $user = Auth::user();
      // Get the currently authenticated user's ID...
      $id = Auth::id();
      $items = DB::table('pages')->where('meta_description', 'home')->first();
      if (Auth::check()) {
        $items->username = $user['name'];
         $items->check = '(Logged in!)';
      } else {
        $items->username = 'Gast';
      }
      return view('home')->with('items', $items);
   }

   public function impressum()
   {
     return view('impressum');
   }
}
