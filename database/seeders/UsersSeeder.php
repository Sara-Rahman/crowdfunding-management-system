<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role= Role::create (
            [
                'name'=>'admin',
                'slug'=>'login of admin',
            ]
            );

            
        User::create(
            [
                'role_id'=>$role->id,
                'name'=>'Nowshin',
                'email'=>'nowshin1@gmail.com',
                'password'=>bcrypt('12345'),
                'mobile'=>'01727265497',
                
              
            ]
        );
    }
}
