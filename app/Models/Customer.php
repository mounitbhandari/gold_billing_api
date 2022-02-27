<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    private $company_id;
    private $customer_name;
    private $mobile1;
    private $mobile2;
    private $address;
    private $opening_gold;
    private $opening_lc;
    private $mailing_name;
}
