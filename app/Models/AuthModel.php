<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AuthModel extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $guard = 'admin';

    protected $fillable = ['email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
