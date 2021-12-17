<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $timestamp = false;
    const CREATED_AT   = 'created';
    const UPDATED_AT   = 'modified';

    protected $crudNotAccepted     = [
        '_token',
        'thumb_current',
    ];
}
