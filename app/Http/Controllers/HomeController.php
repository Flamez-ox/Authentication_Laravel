<?php

namespace App\Http\Controllers;

use App\Mail\Websitemail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use Mail;
Use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('home');
    }


    public function register()
    {
       return view('register');
    }
    
    public function login()
    {
       return view('login');
    }

    public function login_submit(Request $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'active',
        ];

       if ( Auth::attempt($login)) {
        return redirect()->route('dashboard');
       }else{
        return redirect()->route('login');
       }
    }


    public function dashboard()
    {
       return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register_submit(Request $request)
    {
        $token = hash('murmur3a', 'sha2-256');
        //
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'pending';
        $user->token = $token;
        $user->save();

        $verification_link = url('reg/verify/'.$token.'/'.$request->email);
        $subject = 'Register';
        $message = 'Please click the link to verify:<br><a href="'.$verification_link.'">Click here </a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        echo 'email sent'; 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function reg(string $token,$email)
    {
        $user = User::where('token',$token)->where('email',$email)->first();

        if (!$user) {
            return redirect()->route('login');
        }

        $user->status = 'active';
        $user->token = '';
        $user->update();

        echo "Registration verify Successfully";
    }

    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout()
    {
       Auth::guard('web')->logout();

       return redirect()->route('login');
    }
}
