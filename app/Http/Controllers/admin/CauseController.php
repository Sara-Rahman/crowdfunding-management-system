<?php

namespace App\Http\Controllers\admin;

use App\Models\Cause;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CauseController extends Controller
{
    public function cause()
    {
        $causelist=Cause::all();
        return view('admin.cause.cause',compact('causelist'));

    }
    public function createCause()
    {
        return view('admin.cause.create-cause');
    }
    public function storeCause(Request $req)
    {
        $image_name=null;
        if($req->hasFile('cause_image'))
        {
            $image_name=date('Ymdhis').'.'.$req->file('cause_image')->getClientOriginalExtension();
            $req->file('cause_image')->storeAs('/causes',$image_name);
        }
        $req->validate([
            'name'=>'required',
            'category'=>'required',
            'target_amount'=>'required',
            'details'=>'required',
            'location'=>'required',



        ]);

        Cause::create([
            'name'=>$req->name,
            'details'=>$req->details,
            'category'=>$req->category,
            'location'=>$req->location,
            'contact'=>$req->contact,
            'target_amount'=>$req->target_amount,
            'image'=>$image_name

        ]);
        Toastr::success('Cause Updated Successfully', 'success');
        return redirect()->back()->with('success','Cause has been created successfully');


    }
    public function viewCause($cause_id)
    {
        $cause=Cause::find($cause_id);
        return view('admin.cause.view-cause',compact('cause'));

    }
    public function editCause($cause_id)
    {
        $cause=Cause::find($cause_id);
        return view('admin.cause.edit-cause',compact('cause'));

    }
    public function updateCause(Request $req,$cause_id)
    {
        $cause=Cause::find($cause_id);
        $image_name=$cause->image;
        if($req->hasFile('cause_image'))
        {
            $image_name=date('Ymdhis') .'.'. $req->file('cause_image')->getClientOriginalExtension();

            $req->file('cause_image')->storeAs('/causes',$image_name);

        }
        $cause->update([
            'name'=>$req->name,
            'details'=>$req->details,
            'category'=>$req->category,
            'location'=>$req->location,
            'contact'=>$req->contact,
            'target_amount'=>$req->target_amount,
            'image'=>$image_name

        ]);
        Toastr::success('Cause Updated Successfully', 'success');
        return redirect()->route('cause')->with('success','Cause has been updated successfully');

    }
    public function deleteCause($cause_id)
    {
        Cause::find($cause_id)->delete();
        return redirect()->back()->with('success','Cause has been deleted!');


    }
}
