<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Blog;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        return view('blog', compact('items'));
    }

    public function create(Request $request)
    {
        return view('sets', compact('items'));
    }

    public function update(Request $request)
    {
        return view('sets', compact('items'));
    }

    public function delete(Request $request)
    {
        return view('sets', compact('items'));
    }
}