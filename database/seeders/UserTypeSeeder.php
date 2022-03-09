<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
