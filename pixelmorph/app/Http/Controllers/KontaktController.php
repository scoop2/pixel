<?php
namespace App\Http\Controllers;

class KontaktController extends Controller
{
    public function index($id = 0)
    {

        // $desc = Pages::where('status', 'ACTIVE')->where('title', 'Testpage')->first();
        //  return view('test', ['desc' => $desc]);
        //  return view('kontakt')->with('desc', $desc);
        return view('kontakt');
    }
}
