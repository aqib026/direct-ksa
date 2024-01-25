<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVisaApplications extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }
    public function transactions()
    {
        return $this->hasOne(Transaction::class, 'order_id', 'order_id');
    }
}
