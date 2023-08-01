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

    $dom = new \DOMDocument();

    $dom->loadHTML($mobile_detail);
    // Initialize an array to store the extracted data
    $extractedData = array();

    // Function to recursively traverse the DOM tree and build the array
    function extractDataFromNode($node, &$data) {
        if ($node->nodeType === XML_TEXT_NODE) {
            // If it's a text node, add the text content to the array
            $data[] = $node->textContent;
        } else {
            // If it's an element node, process its children
            foreach ($node->childNodes as $childNode) {
                extractDataFromNode($childNode, $data);
            }
        }
    }

    // Start extracting data from the root element (in this case, <div>)
    extractDataFromNode($dom->documentElement, $extractedData);

    print_r($extractedData);    
   }



}
