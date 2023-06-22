<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    protected $table = "faqs";
    protected $Primarykey = 'id';

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }
    use HasFactory;
    public function getQuestionAttribute($value) {
        return session()->has('locale') && session()->get('locale') == 'ar' && !request()->is('admin*') ? $this->{'question_ar'} : $value;  
    }
    public function getAnswerAttribute($value) {
        return session()->has('locale') && session()->get('locale') == 'ar' && !request()->is('admin*') ? $this->{'answer_ar'} : $value;  
    }
}
