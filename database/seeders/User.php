<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make("Aa123456");
        $users = [
              [
               'name'  => 'Admin' ,
               'email' => 'admin@medisonmedia.com' ,
               'password' =>  $password ,
               'created_at'  =>  strtotime("now") ,
               'updated_at'  => null 
              ] ,
              [

               'name'  => 'davknet' ,
               'email' => 'davknet1@gmail.com' ,
               'password' =>  $password ,
               'created_at'  =>  strtotime("now") ,
               'updated_at'  => null 

              ]
        ];

        foreach ($users as $key => $value) {
            
            ModelsUser::create($value) ;
        }
    }
}
