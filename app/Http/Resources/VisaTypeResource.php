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
            'flag_pic'=> asset($this->flag_pic),
            'country_name' => $this->name,
            'country__name_ar' => $this->name_ar,
            'visas' => $this->visas_list($this->countries_id),

            // 'visa_type' => $this->visa_type,
            // 'visa_type_ar' => $this->visa_type_ar,
            // 'adult_price'=>$this->adult_price,
            // 'child_price'=>$this->child_price,
            // 'passport_price'=>$this->passport_price,
            // 'created_at' => date('Y-m-d', strtotime($this->created_at)),
            // 'updated_at' => date('Y-m-d', strtotime($this->updated_at)),
            
        ];
    }

    protected function visas_list(){
        $visas_list = [];
        foreach($this->visatype as $visatype){
            $visas_list[] = [
                'visa_type'      => $visatype->visa_type,
                'visa_type_ar'   => $visatype->visa_type_ar,
                'adult_price'    => $visatype->adult_price,
                'child_price'    => $visatype->child_price,
                'passport_price' => $visatype->passport_price,    
                'url'            => url("/visa_request/$visatype->countries_id/$visatype->visa_type"),
            ];
        }
        return $visas_list;
        
    }

}
