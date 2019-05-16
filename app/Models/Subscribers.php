<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    protected $table = "subscribers";

    protected $fillable = [
        'token',
        'ip',
        'geo',
        'user_agent',
        'referrer',
        'device',
        'device_model',
        'browser',
        'browser_version',
        'os',
        'os_version',
        'comment'
    ];
}
