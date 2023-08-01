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
//<<<<<<< HEAD
            'mobile_detail'=>strip_tags($this->mobile_detail),
            'mobile_detail_ar'=>strip_tags($this->mobile_detail_ar),
//=======
//            'mobile_detail'=> $this->format_detail($this->mobile_detail),
//            'mobile_detail_ar'=>  $this->format_detail($this->mobile_detail_ar),
//>>>>>>> 8d4d0751454fd23cce990d7b295696500cc80be1
     
            ];
    }

//    protected function format_detail($mobile_detail){
//        $mobile_detail =  strip_tags($mobile_detail);
//        $mobile_detail = explode(PHP_EOL, $mobile_detail);
//        $mobile_detail = json_encode($mobile_detail);
//        return $mobile_detail;
//    }
//
}
