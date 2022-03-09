<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Customer;
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

        $this->call(UserTypeSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(UserSeeder::class);

        $this->call(CustomerCategorySeeder::class);
        $this->call(CustomerSeeder::class);


    }
}
