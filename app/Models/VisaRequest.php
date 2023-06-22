<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries;
class VisaRequest extends Model
{
    use HasFactory;
    protected $table = "visa_requests";
    protected $Primarykey = "id";

    public function country()
    {
        return $this->belongsTo(Countries::class, 'countries_id', 'id');
    }

    public function visatype()
    {
        return $this->belongsTo(Countries::class, 'countries_id', 'id');
    }
}
