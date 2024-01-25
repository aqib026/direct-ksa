<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'adult_count',
        'child_count',
        'total_amount',
        'service_charges',
        'customer_service_charges',
        'vat_amount',
        'transaction_id',
        'invoice_id',
        'transaction_date',
        'status',
        'message',
        'order_id',
        'session_id'
    ];
}
