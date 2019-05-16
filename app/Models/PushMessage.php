<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PushMessage extends Model
{
    protected $table = "push_message";

    protected $fillable = [
        'title',
        'body',
        'icon',
        'click_action'
    ];
}
