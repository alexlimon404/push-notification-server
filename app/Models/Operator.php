<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = "operators";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($operator)
    {
        if($operator) {
            $operator = Operator::firstOrCreate(['value' => $operator]);
            return $operator->id;
        }
        return null;
    }
}
