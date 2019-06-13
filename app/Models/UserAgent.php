<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAgent extends Model
{
    protected $table = "user_agents";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($userAgent)
    {
        if($userAgent) {
            $userAgent = UserAgent::firstOrCreate(['value' => $userAgent]);
            return $userAgent->id;
        }
        return null;
    }
}
