<?php

namespace App\Http\Controllers\Demsbet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matchs;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Paris;
use App\Models\Pronostique;

class MatchController extends Controller
{
    public function index(request $request){
        $match= Matchs::getMatch($request->match);
        $pronostiques= Pronostique::getAllPronos(['pronostique.idmatch'=> $match->idmatch]);
        return view('pages.match', compact('match', 'pronostiques'));
    }
    public function parier(request $request){
        $user= Session::get('user');
        $pari= New Paris();
        $pari->montant= $request->montant;
        $pari->iduser= $user->id;
        $pari->idchoix= $request->choix;
        $pari->gain= $request->gain;
        $pari->save();

        $account= User::getUser($user->id);
        $account->available-=$request->montant;
        $account->update(array($account));
        
        return redirect()->back()->with('success', 'pari effectué avec succès');
    }
}
