<?php

namespace App\Http\Controllers\Demsbet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Transaction;
use App\Models\User;

class MoneyController extends Controller
{
    public function index(request $request){

        return view('pages.money');
    }
    

    public function getToken(Request $request){
        $request->getUri('https://demo.campay.net/api/token/');
        $request->setMethod(Request::METHOD_POST);
        $request->setJson(array(
        'follow_redirects' => TRUE
        ));
        $request->header([
        'Content-Type' => 'application/json'
        ]);
        $request->setBody('{\n    "username": "1hBsoSa13uZS5xgVvnfMGBfAMncLEk6gYT51gWMtXPmnjn15ln5Ei1kbSPkx9M08nDMJlWSSh5o-f1ltCbrG9Q",\n    "password": "vTRwqwT4eJY1tJYS7kVv2Alag4jJK-EomjW8uA-MiHC5jJAp5SuzD6gwa3DG0QyKQy7VDDNPs0XcL95XP9MmFQ"\n}');
        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                echo $response->getBody();
            }
            else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
            }
        }
        catch(\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deposit(Request $request){
        $request->setUrl('https://demo.campay.net/api/withdraw/');
        $request->setMethod(Request::METHOD_POST);
        $request->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
        'Authorization' => 'Token '. $this->getToken(),
        'Content-Type' => 'application/json'
        ));
        $request->setBody('{\n    "amount": "1",\n    "to": "2376XXXXXXXX",\n    "description": "Test",\n    "external_reference": ""\n}');
        try {
        $response = $request->send();
        if ($response->getStatus() == 200) {
            return $response->getBody()->token;
        }
        else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
        }
        }
        catch(\Exception $e) {
        echo 'Error: ' . $e->getMessage();
        }
    }

    public function withdraw(Request $request){
        $request->setUrl('https://demo.campay.net/api/withdraw/');
        $request->setMethod(Request::METHOD_POST);
        $request->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
        'Authorization' => 'Token '. $this->getToken(),
        'Content-Type' => 'application/json'
        ));
        $request->setBody('{\n    "amount": "'.$request->montant.'",\n    "to": "'.$request->tel.'",\n    "description": "Retrait Demsbet",\n    "external_reference": "DEMSBET CASH OUT"\n}');
        try {
            $response = $request->send();
        if ($response->getStatus() == 200) {
            dd($response->getBody());
        }
        else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
        }
        }
        catch(\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function verifpayment(Request $request){
        $request->setUrl('https://demo.campay.net/api/transaction/bcedde9b-62a7-4421-96ac-2e6179552a1a/');
        $request->setMethod(Request::METHOD_GET);
        $request->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'Token occvwA9ODVV9vVjIWRKQWbyT0LyDMdNdktd0CKXeflfYNpki47ZkT6vMBjzaxD82v7lME2l4A38U-yo4y8eaHQ',
            'Content-Type' => 'application/json'
        ));
        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                echo $response->getBody();
            }
            else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
            }
        }
        catch(\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deposer(Request $request){
        $user= Session::get('user');
        $transaction= new Transaction();
        $transaction->montant= $request->montant;
        $transaction->iduser= $user->id;
        $transaction->type= 'D';
        $transaction->statut= 'V';
        $transaction->save();

        $account= User::getUser($user->id);
        $account->available+=$request->montant;
        $account->update(array($account));

        return redirect()->back()->with('success', 'Dépot effectué avec succès');
    }

    public function retirer(Request $request){
        $user= Session::get('user');
        $transaction= new Transaction();
        $transaction->montant= $request->montant;
        $transaction->iduser= $user->id;
        $transaction->type= 'R';
        $transaction->statut= 'V';
        $transaction->save();

        $account= User::getUser($user->id);
        $account->available-=$request->montant;
        $account->update(array($account));

        return redirect()->back()->with('success', 'Retrait effectué avec succès');
    }
}
