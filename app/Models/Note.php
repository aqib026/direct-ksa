<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = "note";
    protected $fillable = ['featured_id', 'note'];
    use HasFactory;

    public function note()
    {
        return $this->belongsTo(FeaturedSales::class, 'featured_id', 'id');
    }
}
