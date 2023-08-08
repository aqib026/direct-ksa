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
            'mobile_detail'=>$this->format_detail($this->mobile_detail),
            'mobile_detail_ar'=>$this->format_detail($this->mobile_detail_ar),
     
            ];
    }

   protected function format_detail($mobile_detail){
  
    if($mobile_detail == '') return;
    $htmlData = $mobile_detail;
    $dom = new \DOMDocument();
    $dom->loadHTML($mobile_detail);        

    $valid_tags = ['h2', 'h3', 'p'];
    $tags = $dom->getElementsByTagName('*'); // Selects all elements
    $response = [];
    foreach ($tags as $key => $tag) {
        if ($tag instanceof \DOMElement) {
            if(!in_array($tag->tagName, $valid_tags)) continue;
            $tagName = $tag->tagName;
            $tagText = $tag->textContent;

            $response[][$tagName]  = $tag->textContent;
        }
    }

    return $response;


   }


}
