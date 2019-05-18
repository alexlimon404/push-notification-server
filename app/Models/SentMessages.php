<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentMessages extends Model
{
    protected $table = "sent_messages";

    protected $fillable = [
        'push_message_id',
        'subscriber_id',
    ];
}
