<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($country)
    {
        if($country) {
            $country = Country::firstOrCreate(['value' => $country]);
            return $country->id;
        }
        return null;
    }
}
