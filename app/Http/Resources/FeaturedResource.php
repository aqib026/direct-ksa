<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedResource extends JsonResource
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
            'required_service' => $this->required_service,
            'paper_quantity' => $this->paper_quantity, // Assuming the country name is stored in the `name` column
            'documents' => $this->documents,
            'status'=>$this->status,
            'translation_content '=>$this->translation_content ,
            'user_id '=>$this->user_id ,
            'idl_card_qty '=>$this->idl_card_qty ,
            'lic_col_choice '=>$this->lic_col_choice ,
            'idl_qty '=>$this->idl_qty,
            'univ_adm_country '=>$this->univ_adm_country ,
            'nationality '=>$this->nationality ,
            'mode_of_finance '=>$this->mode_of_finance ,
            'major_of_study '=>$this->major_of_study ,
            'current_qualification '=>$this->current_qualification ,
            'last_qualification_grade '=>$this->last_qualification_grade ,
            'certification '=>$this->certification ,
            'call_time '=>$this->call_time ,
            'form_type '=>$this->form_type ,
            'passport_quantity '=>$this->passport_quantity ,
            'country '=>$this->country ,
            'applicant_name '=>$this->applicant_name ,
            'mobile_number '=>$this->mobile_number ,
            'email '=>$this->email ,
            'service_cost '=>$this->service_cost ,
            'created_at' => date('Y-m-d', strtotime($this->created_at)),


        ];
        return parent::toArray($request);
    }
}
