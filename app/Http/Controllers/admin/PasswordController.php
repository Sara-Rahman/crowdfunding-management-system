<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassEmail;

class PasswordController extends Controller
{
    public function forgetpasswordemail()
    {

       return view('admin.pages.resetPassword.forget');

    }

    public function check_forgetpasswordemail( Request $request )
    {

         //validate request has email and it exist or not
         $request->validate([
            'email'=>'required|exists:users'
         ]);
         $token=Str::random(50);
         $user=User::where('email',$request->email)->first();
         $user->update ([
            'reset_token'=>$token,
            'reset_token_expire_at'=>Carbon::now()->addMinute(2),
         ]);
         $link=route('reset.password',$token);
         
        //  dd($link);
        Mail::to($request->email)->send(new ResetPassEmail($link));
        return redirect()->back();


    }

    public function resetPassword($token)
    {
   
       return view('admin.pages.resetPassword.reset',compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'reset_token'=>'required',
            'password'=>'required|confirmed',
        ]);

      //check token exist or not
        $userHasToken=User::where('reset_token',$request->reset_token)->first();
        if($userHasToken){
            //check token expired or not
            if($userHasToken->reset_token_expire_at>=Carbon::now()){
               $userHasToken->update([
                  'password'=> bcrypt($request->password),
                   'reset_token'=>null
               ]);


               return redirect()->back();
            }else{
                return redirect()->back();
            }

        }else
        {
            return redirect()->back();
        }


    }

}
