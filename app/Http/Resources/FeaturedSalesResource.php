<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedSalesResource extends JsonResource
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
           
            'required_service' => $this->required_service,
            'applicant_name '=>$this->applicant_name ,
            'mobile_number '=>$this->mobile_number ,
            'email '=>$this->email ,
            'status'=>$this->status,
            'created_at' => date('Y-m-d', strtotime($this->created_at)),
        
        
        ];
        return parent::toArray($request);
    }
}
