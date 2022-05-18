<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Donor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\DbDumper\Databases\MySql;
use Laravel\Socialite\Facades\Socialite;

// composer require spatie/db-dumper


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
        // dd("ok");
        $userInfo=$req->except('_token');

        if ( Auth::guard('web')->attempt([ 'email'=>$req->email,'password'=>$req->password])|| Auth::guard('volunteer')->attempt([ 'email'=>$req->email,'password'=>$req->password])) {
            return redirect()->route('admin.index')->with('message','Login successful.');
        }
        else{
       
        return redirect()->back()->with('error','Invalid user credentials');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('message','Logged out.');
    }
   
    public function export()
    {
        // dd(config('database.connections.mysql.database'));
     
        MySql::create()
        ->setDbName(config('database.connections.mysql.database'))
        ->setUserName(config('database.connections.mysql.username'))
        ->setPassword(config('database.connections.mysql.password'))
        ->dumpToFile('cfms.sql');

    return response()->download(public_path('/cfms.sql'));
    }


    public function doLocalization($locale)
    

        {
            // dd($locale);
            App::setLocale($locale);
            session()->put('applocale', $locale);
            // dd($locale);
            return redirect()->back();
        }

   

    
}
