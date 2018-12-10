<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    function private () {
        if (Gate::allows('admin-only', auth()->user())) {
            return view('private');
        }
        return 'You are not admin!!!!';
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $pages = DB::table('pages')->get();
        return view('admin.index', ['pages' => $pages, 'user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        DB::table('pages')->where('id', $request->input('id'))->update(['title' => $request->input('title'), 'body' => $request->input('text')]);
        $pages = DB::table('pages')->get();
        return view('admin.index', ['pages' => $pages, 'user' => $user]);
    }

}
