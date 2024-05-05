<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Events\Registered;
//event(new Registered($user));
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    
    protected $fillable = [ //not null인 컬럼
        'no',
        'id',
        'email',
        'password',

    ];
    protected $hidden = [ //숨겨져야 하는 컬럼
    	'password',
        'rememberToken'
    ];

    protected $casts = [
    	'email_verified_at' => 'datetime',
    ];

    
}
