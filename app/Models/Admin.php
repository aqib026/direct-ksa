<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = [
        'name',
        'email',
        'number',
        'password',
        'usertype',
    ];

    protected $Primarykey = 'id';

    public function services()
    {
        return $this->belongsTo(FeaturedSales::class, 'user_id', 'id');
    }
}
