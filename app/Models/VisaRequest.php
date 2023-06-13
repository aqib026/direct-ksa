<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaRequest extends Model
{
    protected $table = "visa_requests";
    protected $Primarykey = "id";

    public function visatype()
    {
        return $this->belongsTo(countries::class, 'countries_id', 'id');
    }
    use HasFactory;
}
