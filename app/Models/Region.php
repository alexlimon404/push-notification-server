<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "regions";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($region)
    {
        if($region) {
            $region = Region::firstOrCreate(['value' => $region]);
            return $region->id;
        }
        return null;
    }
}
