<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerKey extends Model
{
    protected $table = "server_keys";

    protected $fillable = [
        'domain_name',
        'sender_id',
        'server_key',
        'legacy_server_key',
    ];
}
