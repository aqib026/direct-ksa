<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Queue\ShouldQueue;

class User extends Authenticatable  implements MustVerifyEmail
{
    use Notifiable;
    use HasApiTokens;
//    use MustVerifyEmailTrait;
    // ...
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'number',
        'usertype',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
