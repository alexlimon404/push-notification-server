<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Browser extends Model
{
    protected $table = "browsers";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($browser)
    {
        if($browser) {
            $browser = Browser::firstOrCreate(['value' => $browser]);
            return $browser->id;
        }
        return null;
    }
}
