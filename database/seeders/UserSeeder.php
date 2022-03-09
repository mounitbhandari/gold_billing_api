<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'Sukanta Hui','email'=>'developer','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1,'company_id'=>1]);
        User::create(['name'=>'Administrator','email'=>'admin','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1,'company_id'=>1]);
        User::create(['name'=>'Tanusree Hui','email'=>'owner','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1,'company_id'=>2]);
    }
}
