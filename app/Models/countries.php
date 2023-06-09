<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visa;

class countries extends Model
{
    use HasFactory;
    protected $table = "countries";
    protected $primarykey = "id";



    public function visa()
    {
        return $this->hasone('App\Models\Visa');
    }
}
