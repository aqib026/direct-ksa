<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\countries;

class Visa extends Model
{
    protected $table = "visa_requirement";
    protected $Primarykey = "id";

        public function getDetailAttribute($value) {
            return session()->has('locale') && session()->get('locale') == 'ar' && !request()->is('admin*') ? $this->{'detail_ar'} : $value;  
        }

    public function visa()
    {
        return $this->belongsTo(countries::class, 'countries_id', 'id');
    }
    use HasFactory;
}
