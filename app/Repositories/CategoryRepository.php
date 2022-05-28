<?php
namespace App\Repositories;

use App\Models\Category;
use http\Env\Request;
use http\Env\Response;


class CategoryRepository
{
    
    public function storecategory($request)
     {
      
        {
           
           

        $category=Category::create([
             'name'=>$request->name,
             'details'=>$request->details,
         ]);

       

         return $category;

        }
  
      }
}