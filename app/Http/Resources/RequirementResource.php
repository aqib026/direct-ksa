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
    
    protected function format_detail($mobile_detail) {
        
        if ($mobile_detail == '') return;
        $htmlData = $mobile_detail;
        $dom = new \DOMDocument();
        $dom->loadHTML($mobile_detail);
        
        $valid_tags = ['h2', 'h3', 'p'];
        $tags = $dom->getElementsByTagName('*'); // Selects all elements
        $response = [];
        $currentH2 = null; // To track the current h2 being processed
        
        foreach ($tags as $key => $tag) {
            if ($tag instanceof \DOMElement) {
                $tagName = $tag->tagName;
                $tagText = $tag->textContent;
                
                if (in_array($tagName, $valid_tags)) {
                    if ($tagName === 'h2') {
                        if ($currentH2) {
                            $response[] = $currentH2;
                        }
                        $currentH2 = ['h2' => $tagText, 'items' => []];
                    } elseif ($tagName === 'h3') {
                        $currentH3 = ['h3' => $tagText];
                    } elseif ($tagName === 'p') {
                        if (isset($currentH2['p'])) {
                            $response[] = $currentH2;
                            $currentH2 = ['h2' => $tagText, 'items' => []];
                        } elseif (isset($currentH3)) {
                            $currentH3['p'] = $tagText;
                            $currentH2['items'][] = $currentH3;
                            unset($currentH3);
                        } else {
                            $currentH2['p'] = $tagText;
                        }
                    }
                }
            }
        }
        
        if ($currentH2) {
            $response[] = $currentH2;
        }
        
        return $response;
    }

    
    
    
    
}
