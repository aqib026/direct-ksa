<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table="categorie";
    protected $PrimaryKey='id';

    public function categorie()
    {
        return $this->hasmany('App\Models\Faqs');
    }
    public function getNameAttribute($value) {
        return session()->has('locale') && session()->get('locale') == 'ar' && !request()->is('admin*') ? $this->{'name_ar'} : $value;  
    }
    use HasFactory;
}
