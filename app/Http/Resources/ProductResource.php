<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed product_name
 * @property mixed description
 * @property mixed in_force
 */
class ProductResource extends JsonResource
{
    /**
     * @var mixed
     */
    // private $company_id;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'productId'=>$this->id,
            'companyId'=>$this->company_id,
            'productName'=>$this->product_name,
            'description'=>$this->description,
            'isInForced'=>$this->in_force,
        ];
    }
}
