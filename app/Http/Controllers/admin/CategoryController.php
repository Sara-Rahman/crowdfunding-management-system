<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Events\CategoryCreateEvent;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;


class CategoryController extends Controller
{
     //showing Category  List

     public function showcategory()
     {

      if(Cache::has('Categories'))
      {
        $category=Cache::get('Categories');
        $msg='Data from Cache';
      
      }
      else{
      
         $category=Category::all();
         Cache::put('Categories', $category);
         $msg='Data from Database';

        }

       return view('admin.pages.category.list',compact('category','msg'));

      }
 
     //Creating Category through Form
     public function creatcategory()
     {
      

       return view('admin.pages.category.create');

      }
 
      //storing Category Data through Form
     public function storecategory(CategoryRequest $request,CategoryRepository $category)
     {
      
        {
           
            // $request->validate([
            //   'name'=>'required',
            //   'details'=>'required',
            // ]);

       
            // event constructor variable is called
          $a=$category->storecategory($request);
          event(new CategoryCreateEvent($a));
         Toastr::success('Category Created Successfully', 'success');
         return redirect()->route('show.category');

        }
  
      }
 
       //View Category 
      public function Viewcategory($id)
      {
          $category=Category::find($id);

          return view('admin.pages.category.view', compact('category'));

      }
 
       //Update Category 
      public function editcategory($categoryr_id)
      {
          $category=Category::find($categoryr_id);

          return view('admin.pages.category.edit',compact('category'));

      }
      public function Updatecategory(Request $request,$categoryr_id)
      {
      
      
          $category=Category::find($categoryr_id);
          $category->update([
         
             'name'=>$request->name,
             'details'=>$request->details,
         ]);

         Toastr::success('Category Updated Successfully', 'success');

       
         return redirect()->route('show.category');

      }
 
      //Delete Category 
      public function Deletecategory($id)
      {
        Category::find($id)->delete();

        Toastr::error('Category Deleted Successfully');


          return redirect()->back();
      }
 
 
 
      
}
