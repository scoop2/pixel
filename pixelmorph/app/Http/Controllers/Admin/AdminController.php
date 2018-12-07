<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        //$desc = Pages::where('status', 'ACTIVE')->where('title', 'Skills')->first();
        $pages = DB::table('pages')->get();
        return view('admin.index', ['pages' => $pages, 'request' => $request]);
    }

    public function update(Request $request)
    {

        //$pages = new Pages;
        //$pages->title = Input::get
        //$pages = DB::table('pages')->get();

        DB::table('pages')->where('id', $request->input('id'))->update(['title' => $request->input('title'), 'body' => $request->input('text')]);
        $pages = DB::table('pages')->get();
        return view('admin.index', ['pages' => $pages]);
    }

}
