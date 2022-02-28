<?php

namespace App\Http\Controllers\admin;

use App\Models\Donor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonorController extends Controller
{
    public function DonorList()
    {
        $donor=Donor::all();
        return view('website.donor.list',compact('donor'));
    }

    public function DonorView($donor_id)
    {
        $donor=Donor::find($donor_id);
        return view('website.donor.view',compact('donor'));
    }

    public function CreateDonor()
    {
        return view('website.donor.create');
    }

    public function StoreDonor(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'email:rfc,dns',
            'password'=>'required',
            'gender'=>'required',
            'city'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'occupation'=>'required',
        ]);

        $image_name=null;
        if($request->hasFile('donor_image'))
        {
            $image_name=date('Ymdhis').'.'.$request->file('donor_image')->getClientOriginalExtension();
            $request->file('donor_image')->storeAs('/donors',$image_name);
        }
        
        Donor::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'gender'=>$request->gender,
            'city'=>$request->city,
            'address'=>$request->address,
            'mobile'=>$request->mobile,
            'occupation'=>$request->occupation,
            'image'=>$image_name
        ]);
        return redirect()->route('list.donor')->with('message','Donor Created Successfully');
    }

    public function DonorEdit($donor_id)
    {
        $donor=Donor::find($donor_id);
        return view('website.donor.edit',compact('donor')); 
    }

    public function DonorUpdate(Request $request, $donor_id)
    {
        $donor=Donor::find($donor_id);
        $donor->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'city'=>$request->city,
            'address'=>$request->address,
            'mobile'=>$request->mobile,
            'occupation'=>$request->occupation,
        ]);
        return redirect()->route('list.donor')->with('message','Donor Updated Successfully'); 
    }

    public function DonorDelete($donor_id)
    {
        Donor::find($donor_id)->delete();
        return redirect()->back()->with('delete','Donor Deleted Successfully'); 
    }

}
