<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed user_type_id
 * @property mixed user_type
 * @property mixed company
 * @property mixed token
 */
class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uniqueId' => $this->id,
            'userName' => $this->name,
            'userTypeId' => $this->user_type_id,
            'userTypeName' => $this->user_type->user_type_name,
            'company' => new CompanyResource($this->company),
            'token' => $this->token,
        ];
    }
}
