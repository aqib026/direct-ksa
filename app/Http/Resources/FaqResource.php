<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
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
            'name' => $this->name,
            'name_ar' => $this->name_ar,
            'status'  => $this->status,
            'created_at' => date('Y-m-d', strtotime($this->created_at)),
            'visas' => $this->faq_list($this->categorie_id),
        
        ];
        
    }
    
    protected function faq_list(){
        $faq_list = [];
        foreach($this->categorie as $faqs){
            $faq_list[] = [
                'question'      => $faqs->question,
                'question_ar'   => $faqs->question_ar,
                'answer'    => $faqs->answer,
                'answer_ar'    => $faqs->answer_ar,
 
            ];
        }
        return $faq_list;
        
    }
    
}
