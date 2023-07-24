<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequirementResource extends JsonResource
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
            'country' => $this->visa->name, // Assuming the country name is stored in the `name` column
            'status' => $this->status,
            'mobile_detail'=>$this->mobile_detail,
            'mobile_detail_ar'=>$this->mobile_detail_ar,
     
            ];
    }
    
}
