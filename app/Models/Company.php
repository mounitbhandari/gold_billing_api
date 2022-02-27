<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function getCreatedAtAttribute($value)
    {
        return changeDateFormUTCtoLocal($this->attributes['created_at']);
    }

    public function getUpdatedAtAttribute($value)
    {
        return changeDateFormUTCtoLocal($this->attributes['updated_at']);
    }
    public function products(){
        return $this->hasMany(Product::class, 'company_id');
    }
    public function customers(){
        return $this->hasMany(Customer::class, 'company_id');
    }
    public function sale_masters(){
        return $this->hasMany(SaleMaster::class, 'company_id');
    }
}
