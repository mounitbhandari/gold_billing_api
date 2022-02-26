<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleMaster extends Model
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
}
