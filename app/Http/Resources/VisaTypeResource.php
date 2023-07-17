<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VisaTypeResource extends JsonResource
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
        'id' => $this->id,
        'countries_id' => $this->countries_id,
        'visa_type' => $this->visa_type,
        'visa_type_ar' => $this->visa_type_ar,
        'adult_price'=>$this->adult_price,
        'child_price'=>$this->child_price,
        'passport_price'=>$this->passport_price,
        'created_at' => date('Y-m-d', strtotime($this->created_at)),
        'updated_at' => date('Y-m-d', strtotime($this->updated_at)),
        'country' => $this->country->name,
        'flag_pic'=> asset($this->country->flag_pic),
        
    ];
}

}
