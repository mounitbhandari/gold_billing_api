<?php

namespace Database\Seeders;

use App\Models\CustomerCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerCategory::create(['category_name' => 'Good', 'company_id'=>2]);
        CustomerCategory::create(['category_name' => 'Moderate', 'company_id'=>2]);
        CustomerCategory::create(['category_name' => 'Best', 'company_id'=>2]);
    }
}
