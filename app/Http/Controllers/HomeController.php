<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = DB::select('select * from users where id = ?', [Auth::id()]);

        return view('home', ['nama' => $user[0]->name]);
    }
}
