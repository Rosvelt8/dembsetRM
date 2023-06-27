<?php

namespace App\Http\Controllers\Demsbet;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.my-account');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if($request->email== "admin" and $request->password=="admin"){
            Session::put('admin', 'yes');
            return redirect()->intended(route('admin/home'));
        }

        if (Auth::attempt($credentials, true)) {
            
            $user = User::where('email', $credentials['email'])->first();
            $sessionUser = new \stdClass();
            foreach ($user->getAttributes() as $key => $value) {
                $sessionUser->$key = $value;
            }
            Session::put('user', $user);
             $user->remember_token = Auth::getSession()->token();
             $user->save();

            $request->session()->put('user', $user);

            return redirect()->intended(route('home'));
        }

        return back()->withErrors('Invalid login credentials.');
    }

    public function logout(){
        Session::flush();Session::flush();
        return redirect(route('/'));
    }
}