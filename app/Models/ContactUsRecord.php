<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'number',
        'message',
        'email'
    ];
}
