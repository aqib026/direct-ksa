<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedSales extends Model
{
    protected $table = "featured_sales";
    protected $Primarykey = "id";
    use HasFactory;

    public function note()
    {
        return $this->hasMany('App\Models\Note','featured_id');
    }
    public function services()
    {
        return $this->hasMany('App\Models\Note','user_id');
    }
}
