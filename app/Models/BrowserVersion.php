<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrowserVersion extends Model
{
    protected $table = "browser_versions";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($browserVersion)
    {
        if($browserVersion) {
            $browserVersion = BrowserVersion::firstOrCreate(['value' => $browserVersion]);
            return $browserVersion->id;
        }
        return null;
    }
}
