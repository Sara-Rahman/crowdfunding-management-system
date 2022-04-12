<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Donor;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AdminController extends Controller
{
    

    // public function CreateDonation()
    // {
    //     return view('website.donation.list');
    // }
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {
            
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect()->route('admin.index');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => 1,
                 
                    'facebook_id' => $user->id,
                    'password' => bcrypt('12345')
                ]);

                Auth::login($createUser);
                return redirect()->route('admin.index');
            }

        } catch (\Throwable $exception) {
            dd($exception->getMessage());
        }
    }


    public function login(Request $request)
    {
        // dd($request->all());
        $userPost=$request->except('_token');

        if(Auth::attempt($userPost)){
            return redirect()->route('admin.index')->with('msg','Login Successful');
        }
        else
        return redirect()->back()->with('msg','Incorrect information');
    }

    public function index()
    {
        return view('admin.master');
    }

    public function formlogin()
    {
        return view('admin.login');
    }
   
    public function doLogin(Request $req)
    {
        $userInfo=$req->except('_token');

        if(Auth::attempt($userInfo)){
            return redirect()->route('admin.index')->with('message','Login successful.');
        }
        return redirect()->back()->with('error','Invalid user credentials');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('message','Logged out.');
    }
   

    
}
