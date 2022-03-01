<?php

namespace App\Http\Controllers\admin;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Brian2694\Toastr\Facades\Toastr;


class VolunteerController extends Controller
{
    //showing Volunter List

    public function showVolunteer()
    {
     
        $volunteers=Volunteer::all();

      return view('admin.pages.volunteer.list',compact('volunteers'));

 
     }

    //Creating Volunter through Form
    public function creatVolunteer()
    {
     

      return view('admin.pages.volunteer.create');

 
     }

     //storing Volunter Data through Form
    public function storeVolunteer(Request $request)
    {
     
        $image_name=null;
        // step1
        if ($request->hasFile('volunteer_image'))
        
        // step 2 genertae file name
        {
           
            $image_name=date('Ymdhis').'.'.$request->file('volunteer_image')->getClientOriginalExtension();
            // step 3: store project directory
             $request->File('volunteer_image')->storeAs('/volunteers',$image_name);
        }
        {
            // dd($request->all());
            $request->validate([
              'name'=>'required',
              'email'=>'required',
              'password'=>'required',
              'gender'=>'required',
              'city'=>'required',
              'address'=>'required',
              'occupation'=>'required',
              'education'=>'required',
              'mobile'=>'required',
              'volunteer_image'=>'required',
              
        
        
            ]);
            
            //creating new volunteer
     
        Volunteer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'gender'=>$request->gender,
            'city'=>$request->city,
            'address'=>$request->address,
            'occupation'=>$request->occupation,
            'education'=>$request->education,
            'mobile'=>$request->mobile,
            'image'=>$image_name
        ]);

        Toastr::success('Volunteer Created Successfully', 'success');
        return redirect()->route('show.volunteer');

 
     }
    }
    
    //View profile of Volunteer

     public function ViewVolunteerProfile($id)
     {
         $volunteers=Volunteer::find($id);

         return view('admin.pages.volunteer.view', compact('volunteers'));

     }
   
     //Update profile of Volunteer
     public function editVolunteerProfile($volunteer_id)
     {
         $volunteers=Volunteer::find($volunteer_id);

         return view('admin.pages.volunteer.edit',compact('volunteers'));

     }
     public function UpdateVolunteerProfile(Request $request,$volunteer_id)
     {

        $volunteers=Volunteer::find($volunteer_id);
        $image_name=$volunteers->image;

       
        // step1
        if ($request->hasFile('volunteer_image'))
        
        // step 2 genertae file name
        {
           
            $image_name=date('Ymdhis').'.'.$request->file('volunteer_image')->getClientOriginalExtension();
            // step 3: store project directory
             $request->File('volunteer_image')->storeAs('/volunteers',$image_name);
        }
     
       
         $volunteers->update([
        
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'city'=>$request->city,
            'address'=>$request->address,
            'occupation'=>$request->occupation,
            'education'=>$request->education,
            'mobile'=>$request->mobile,
            'image'=>$image_name
              
    
        ]);

        Toastr::success('Volunteer Updated Successfully', 'success');
      
        return redirect()->route('show.volunteer');

     }

     //Delete profile of Volunteer
     public function DeleteVolunteerProfile($id)
     {
       Volunteer::find($id)->delete();

       Toastr::error('Volunteer Deleted Successfully');

         return redirect()->back();
     }




     
     }



     


