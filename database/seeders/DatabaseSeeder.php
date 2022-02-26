<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserType::insert([
            ['user_type_name' => 'Admin'],
            ['user_type_name' => 'Developer'],
            ['user_type_name' => 'Owner'],
            ['user_type_name' => 'Manager'],
            ['user_type_name' => 'Employee'],
        ]);
        Company::create(['company_name' => 'Not Applicable','mailing_name'=>'Not Applicable']);
        Company::create(['company_name' => 'LG','mailing_name'=>'LG']);
        Company::create(['company_name' => 'SAMSUNG','mailing_name'=>'SAMSUNG']);
        Company::create(['company_name' => 'DELL','mailing_name'=>'DELL']);

        User::create(['name'=>'Sukanta Hui','email'=>'developer','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1,'company_id'=>1]);
        User::create(['name'=>'Administrator','email'=>'admin','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1,'company_id'=>1]);
        User::create(['name'=>'Tanusree Hui','email'=>'owner','password'=>"81dc9bdb52d04dc20036dbd8313ed055",'user_type_id'=>1,'company_id'=>2]);
    }
}
