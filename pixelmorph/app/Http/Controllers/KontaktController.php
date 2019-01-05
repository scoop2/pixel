<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontaktController extends Controller
{
    public function index(Request $request, $responsive = 'desk')
    {

        $user = Auth::user();
        if ($responsive == 'desk') {
            return view('desk.kontakt', ['responsive' => $responsive, 'user' => $user]);
        } else {
            return view('mobile.kontakt', ['responsive' => $responsive, 'user' => $user]);
        }
    }
}
