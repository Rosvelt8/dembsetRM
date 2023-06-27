<?php

namespace App\Http\Controllers\Demsbet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Paris;

class ParisController extends Controller
{
    public function index(request $request){
        $paris= Paris::getParisByUser();
        // dd($paris);
        return view('pages.paris', compact('paris'));
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
