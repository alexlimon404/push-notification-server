<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = "languages";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($language)
    {
        if($language) {
            $language = Language::firstOrCreate(['value' => $language]);
            return $language->id;
        }
        return null;
    }
}
