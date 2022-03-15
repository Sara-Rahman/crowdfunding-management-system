<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        //for volunteer
         $check_volunteer=Module::where('name','Volunteer')->first();
         if(!$check_volunteer)
         {
           $module=  Module::create([

                'name'=>'Volunteer',
             ]);

             //Volunteers permission
             $events=['show.volunteer','create.volunteer','store.volunteer','view.volunteer','edit.volunteer','update.volunteer','delete.volunteer'];
             
             foreach( $events as $permission )
             {
                 Permission::create([
                     'module_id'=>$module->id,
                     'name'=>$permission,
                     'slug'=>Str::slug($permission)
                 ]);
             }

         }

          //for donor
          $check_donor=Module::where('name','Donor')->first();
          if(!$check_donor)
            {
            $module=  Module::create([
                 'name'=>'Donor',
              ]);
              
              //Donor permissions
              $don_permissions=['create.donor','store.donor','list.donor','view.donor','edit.donor','update.donor','delete.donor'];
              
              foreach( $don_permissions as $permission )
              {
                  Permission::create([
                      'module_id'=>$module->id,
                      'name'=>$permission,
                      'slug'=>Str::slug($permission)
                  ]);
              }
 
            }

            //for category
            $check_category=Module::where('name','Category')->first();
            if(!$check_category)
            {
            $module=  Module::create([
                 'name'=>'Category',
              ]);
              
              //Donor permissions
              $cat_permissions=['show.category','create.category','store.category','view.category','edit.category','update.category','delete.category'];
              
              foreach( $cat_permissions as $permission )
                {
                  Permission::create([
                      'module_id'=>$module->id,
                      'name'=>$permission,
                      'slug'=>Str::slug($permission)
                  ]);
                }
 
            }

            //for cause
            $check_cause=Module::where('name','Cause')->first();
            if(!$check_cause)
            {
            $module=  Module::create([
                 'name'=>'Cause',
              ]);
              
              //Donor permissions
              $cause_per=['cause.list','create.cause','store.cause','view.cause','edit.cause','update.cause','delete.cause'];
              
              foreach($cause_per as $permission )
                {
                  Permission::create([
                      'module_id'=>$module->id,
                      'name'=>$permission,
                      'slug'=>Str::slug($permission)
                  ]);
                }
 
            }

            
         
    }
}
