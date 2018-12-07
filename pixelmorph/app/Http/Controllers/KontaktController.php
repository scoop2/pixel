<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class KontaktController extends Controller
{
    public function index($id = 0)
    {
        $user = Auth::user();
        return view('kontakt', ['user' => $user]);
    }
}
