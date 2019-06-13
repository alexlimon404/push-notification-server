<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OSVersion extends Model
{
    protected $table = "os_versions";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($OSVersion)
    {
        if($OSVersion) {
            $OSVersion = OSVersion::firstOrCreate(['value' => $OSVersion]);
            return $OSVersion->id;
        }
        return null;
    }
}
