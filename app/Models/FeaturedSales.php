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
        return $this->hasmany('App\Models\Note', 'id');
    }
}
