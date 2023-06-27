<?php

namespace App\Http\Controllers\Demsbet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Matchs;

class HomeController extends Controller
{
    public function index(){
        // dd(Session::get('user'));
        $matchs= Matchs::getMatchs();
        return view('pages.home', compact('matchs'));
    }
}
