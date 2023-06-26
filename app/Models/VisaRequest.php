<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;
class VisaRequest extends Model
{
    
    protected $table = "visa_requests";
    protected $fillable =['countries_id','id'];
  protected $guarded =[];
  
    public function country()
    {
        return $this->belongsTo(Countries::class, 'countries_id', 'id');
    }
    public function getVisaTypeAttribute($value) {
        return session()->has('locale') && session()->get('locale') == 'ar' && !request()->is('admin*') ? $this->{'visa_type_ar'} : $value;  
    }
    
    public function visatype()
    {
        return $this->belongsTo(Countries::class, 'countries_id', 'id');
    }
    use HasFactory;
}
