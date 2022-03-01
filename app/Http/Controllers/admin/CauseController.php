<?php

namespace App\Http\Controllers\admin;

use App\Models\Cause;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CauseController extends Controller
{
    public function cause()
    {
        $causelist=Cause::with('category')->get();
        return view('admin.pages.cause.list',compact('causelist'));

    }
    public function createCause()

    {
        $categories=Category::all();
        return view('admin.pages.cause.create',compact('categories'));
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
            'target_amount'=>'required',
            'details'=>'required',
            'location'=>'required',



        ]);

        Cause::create([
            
            'name'=>$req->name,
            'details'=>$req->details,
            'category_id'=>$req->category_id,
            'location'=>$req->location,
            'contact'=>$req->contact,
            'target_amount'=>$req->target_amount,
            'image'=>$image_name

        ]);
        Toastr::success('Cause Created Successfully', 'success');
        return redirect()->route('cause.list');
        


    }
    public function viewCause($cause_id)
    {
        $cause=Cause::with('category')->find($cause_id);
        return view('admin.pages.cause.view',compact('cause'));

    }
    public function editCause($cause_id)
    {
        $cause=Cause::find($cause_id);
        return view('admin.pages.cause.edit',compact('cause'));

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
        return redirect()->route('cause.list');

    }
    public function deleteCause($cause_id)
    {
        Cause::find($cause_id)->delete();
        Toastr::error('Cause Deleted Successfully');

        return redirect()->back();


    }
}
