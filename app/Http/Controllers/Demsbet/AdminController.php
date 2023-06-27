<?php

namespace App\Http\Controllers\Demsbet;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Matchs;
use App\Models\Pronostique;
use App\Models\Paris;
use App\Models\Users;
use App\Models\Choix;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $matchs= Matchs::getMatchs();
        return view('admin.admin-home', compact('matchs'));
    }

    public function match()
    {
        $matchs= Matchs::getMatchs();
        return view('admin.create-match', compact('matchs'));
    }

    public function matchstore(request $request){
        $match= new Matchs();
        $match->equipea= $request->input('equipea');
        $match->equipeb= $request->input('equipeb');
        $match->stade= $request->input('stade');
        $match->save();
        return redirect()->back()->with('success', 'match enregistré avec succès');
    }

    public function pronostique()
    {
        $matchs= Matchs::getMatchs();
        return view('admin.create-pronostique', compact('matchs'));
    }

    public function pronostiquestore(request $request){
        $pronostique= new Pronostique();
        $pronostique->idmatch= $request->input('match');
        $pronostique->intitule= $request->input('intitle');
        $pronostique->save();
        return redirect()->back()->with('success', 'match enregistré avec succès');
    }

    public function choix()
    {
        $matchs= Matchs::getMatchs();
        return view('admin.create-choix', compact('matchs'));
    }
    public function newchoix()
    {
        $matchs= Matchs::getMatchs();
        return view('admin.create-choix', compact('matchs'));
    }

    public function choixstore(request $request){
        $choix= new Choix();
        $choix->cote= $request->input('cote');
        $choix->idprono= $request->input('pronostique');
        $choix->nom= $request->input('name');
        $choix->save();
        return redirect()->back()->with('success', 'match enregistré avec succès');
    }

    public function resultats()
    {
        $matchs= Matchs::getMatchs();
        return view('admin.init-result', compact('matchs'));
    }

    public function resultatstore(request $request){
        $allchoix= $request->choix;
        $statuts= $request->statut;
        // dd($statuts);

        foreach($allchoix as $index => $choix){
            if(isset($statuts[$index])){
                $result= Choix::getChoix($choix);
                $result->statut= 'G';
                $result->update(array($result));

                $parisgagnants= Paris::getAllParis(['paris.idchoix'=> $choix]);
                foreach($parisgagnants as $pari){
                    $parig= Paris::getPari($pari->idparis);
                    $parig->statut='G';
                    $parig->update(array($parig));

                    $user= User::getUser($pari->iduser);
                    $user->available+=$pari->gain;
                    $user->update(array($user));
                }
            }else{
                $result= Choix::getChoix($choix);
                $result->statut= 'P';
                $result->update(array($result));

                $parisgagnants= Paris::getAllParis(['paris.idchoix'=> $choix]);
                foreach($parisgagnants as $pari){
                    $parig= Paris::getPari($pari->idparis);
                    $parig->statut='P';
                    $parig->update(array($parig));
                }
            }
        }
        return redirect()->back()->with('success', 'Résultats enregistré avec succès');
    }
    
}