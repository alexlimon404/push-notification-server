<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table = "sources";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($source)
    {
        if($source) {
            $source = Source::firstOrCreate(['value' => $source]);
            return $source->id;
        }
        return null;
    }
}
