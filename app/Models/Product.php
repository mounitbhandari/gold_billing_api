<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return Attribute
     */
    private $company_id;
    /**
     * @var mixed
     */
    private $product_name;
 
    /**
     * @var mixed
     */
    private $description;
    /**
     * @var mixed
     */
    private $in_force;

    public function getInForceAttribute($value)
    {
        return (bool)$value;
    }
    public function setInForceAttribute($value)
    {
        $this->attributes['in_force'] = (int)$value;
    }
}
