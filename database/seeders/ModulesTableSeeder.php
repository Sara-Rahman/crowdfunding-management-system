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
    }
}
