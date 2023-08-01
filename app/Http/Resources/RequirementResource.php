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
    if($mobile_detail == null || $mobile_detail == '') return '';
    $dom->loadHTML($mobile_detail);

    // Function to recursively traverse the DOM tree and extract text content

    // Start extracting text content from the root element (in this case, <div>)
    $extractedData = $this->extractTextFromNode($dom->documentElement);

    // Convert the $extractedData to a JSON response
    $jsonResponse = json_encode($extractedData);

    // Output the JSON response
    return $jsonResponse;

   }

    // Function to recursively traverse the DOM tree and extract text content
    protected function extractTextFromNode($node) {
        $textData = array();

        if ($node->nodeType === XML_TEXT_NODE) {
            // If it's a text node, add the text content to the $textData array
            $text = trim($node->textContent);
            if ($text !== '') {
                $textData[] = str_replace(array("\r", "\n"), '', $text);
            }
        } else {
            // Process the child nodes
            foreach ($node->childNodes as $childNode) {
                $textData = array_merge($textData, $this->extractTextFromNode($childNode));
            }
        }

        return $textData;
    }




}
