<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table="categorie";
    protected $PrimaryKey='id';

    public function categorie()
    {
        return $this->hasmany('App\Models\Faqs');
    }
    use HasFactory;
}
