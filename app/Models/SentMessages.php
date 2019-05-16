<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentMessages extends Model
{
    protected $table = "sent_messages";

    protected $fillable = [
        'id_push_message',
        'id_subscribe',
    ];
}
