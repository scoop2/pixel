<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminSoundController extends Controller
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
        $sets = DB::table('sets')->get();
        $tags = DB::table('tags')->get();
        $tags_sets = DB::table('tags_sets')->get();
        return view('admin.sound', ['sets' => $sets, 'tags' => $tags, 'tag_sets' => $tags_sets, 'user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        DB::table('skills')->where('id', $request->input('id'))->update([
            'title' => $request->input('title'),
            'skillscats_id' => $request->input('skillscat'),
            'perc' => $request->input('perc'),
            'icon' => $request->input('icon'),
            'image' => $request->input('image'),
            'description' => $request->input('text'),
        ]);
        $skills = DB::table('skills')->get();
        $cats = DB::table('skillscats')->get();
        return view('admin.skills', ['skills' => $skills, 'cats' => $cats, 'user' => $user]);
    }

}
