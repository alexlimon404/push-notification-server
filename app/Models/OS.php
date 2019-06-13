<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
    protected $table = "os";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($os)
    {
        if($os) {
            $os = OS::firstOrCreate(['value' => $os]);
            return $os->id;
        }
        return null;
    }
}
