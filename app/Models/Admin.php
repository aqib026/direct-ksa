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
    public function transactions()
    {
        return $this->hasMany(Transaction::class,'user_id','id');
    }
    public function visaApplication()
    {
        return $this->hasMany(UserVisaApplications::class,'user_id','id');
    }

}
