<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create(['company_id'=>2,'customer_category_id'=>2,'customer_name'=>'Amita Jeweelers','address'=>'Sodepore','opening_gold'=>12.036,'opening_lc'=>2350]);
        Customer::create(['company_id'=>2,'customer_category_id'=>2,'customer_name'=>'Sumit Jeweelers','address'=>'Khardah','opening_gold'=>2.576,'opening_lc'=>950]);
    }
}
