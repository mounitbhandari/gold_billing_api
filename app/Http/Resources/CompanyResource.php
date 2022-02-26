<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed company_name
 * @property mixed mailing_name
 * @property mixed address
 * @property mixed phone1
 * @property mixed phone2
 * @property mixed email
 * @property mixed valid_upto
 * @property mixed doj
 */
class CompanyResource extends JsonResource
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
            'companyId' => $this->id,
            'companyName' => $this->company_name,
            'mailingName' => $this->mailing_name,
            'address' => $this->address,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'email' => $this->email,
            'doj' => $this->doj,
            'validUpto' => $this->valid_upto,
        ];
    }
}
