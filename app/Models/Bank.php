<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = "bank";
    protected $Primarykey = 'id';
    use HasFactory;
    public function getNameAttribute($value) {
        return session()->has('locale') && session()->get('locale') == 'ar' && !request()->is('admin*') ? $this->{'name_ar'} : $value;
    }
    public function getAddressAttribute($value) {
        return session()->has('locale') && session()->get('locale') == 'ar' && !request()->is('admin*') ? $this->{'address_ar'} : $value;
    }
}
