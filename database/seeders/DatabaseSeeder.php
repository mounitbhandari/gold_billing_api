<?php

namespace Database\Seeders;

use App\Models\Company;
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

        Company::insert([
            ['company_name' => 'LG'],
            ['company_name' => 'SAMSUNG'],
            ['company_name' => 'DELL'],
            ['company_name' => 'hp'],
            ['company_name' => 'frontech'],
        ]);
    }
}