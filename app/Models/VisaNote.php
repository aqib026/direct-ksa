<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaNote extends Model
{
    protected $table = "visa_note";
    protected $fillable = ['visa_request_id', 'note'];
    use HasFactory;

    public function note()
    {
        return $this->belongsTo(UserVisaApplications::class, 'visa_request_id', 'id');
    }
}
