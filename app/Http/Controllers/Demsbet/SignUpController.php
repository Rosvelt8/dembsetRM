<?php

namespace App\Http\Controllers\Demsbet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SignUpController extends Controller
{
    public function index(){

        return view('pages.signup');
    }


    public function signup(Request $request)
    {

        // dd($request);
        // $this->validate($request, [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        //     'address' => 'required|string|min:8|confirmed',
        //     'phone' => 'required|string|min:8|confirmed',
        // ]);

        $user = User::create([
            'name' => $request->input('name'),
            'pseudo' => $request->input('pseudo'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'available' => 0,
            'sex' => $request->input('sex'),
            'password' => bcrypt($request->input('password')),
            'email_verified_at' => null,
        ]);

        // Return error if validation fails
       
        // Send email verification
        // Mail::send('email.verify', ['user' => $user], function ($message) use ($user) {
        //     $message->to($user->email);
        //     $message->subject('Verify your email address');
        // });

        return redirect()->route('login')->with('success', 'Your account has been created. Please check your email to verify your account.');
    }

       
}
