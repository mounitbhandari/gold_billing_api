<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create(['company_name' => 'Not Applicable','mailing_name'=>'Not Applicable']);
        Company::create(['company_name' => 'LG','mailing_name'=>'LG']);
        Company::create(['company_name' => 'SAMSUNG','mailing_name'=>'SAMSUNG']);
        Company::create(['company_name' => 'DELL','mailing_name'=>'DELL']);
    }
}
