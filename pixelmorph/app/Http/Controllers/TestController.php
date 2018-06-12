<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pages;

class TestController extends Controller
{
    public function index($id = 0)
//    public function index(Request $request)
    {

        $desc = Pages::where('status', 'ACTIVE')->where('title', 'Testpage')->first();
      //  return view('test', ['desc' => $desc]);
           return view('test')->with('desc', $desc);
    }

    public function show($id = 0) {

      $desc = Pages::where('status', 'ACTIVE')->where('title', 'Testpage')->first();
      $desc->testid = $id;
   //   return view('test', ['desc' => $desc]);
         return view('test')->with('desc', $desc);
   }


}
