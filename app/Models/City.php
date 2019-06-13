<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($city)
    {
        if($city) {
            $city = City::firstOrCreate(['value' => $city]);
            return $city->id;
        }
        return null;
    }
}
