<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Visa;

class Countries extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "countries";
    protected $primarykey = "id";

    public function getNameAttribute($value) {
        return session()->has('locale') && session()->get('locale') == 'ar' && !request()->is('admin*') ? $this->{'name_ar'} : $value;  
    }

    public function visa()
    {
        return $this->hasone('App\Models\Visa');
    }
    public function visatype()
    {
        return $this->hasmany('App\Models\VisaRequest');
    }
}
