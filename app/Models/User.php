<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;

class User extends Authenticatable implements MustVerifyEmail
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
    public function sendEmailVerificationNotification()
    {
        try {
            // Call the default notification method
            parent::sendEmailVerificationNotification();
        } catch (Exception $e) {
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/user-verify-email-send.log'),
             ])->info('There is problem while sending email: /n '.print_r($e->getMessage(), true));
        }
    }
}
