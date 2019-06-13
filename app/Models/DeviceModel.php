<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model
{
    protected $table = "device_models";

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function createOrNew ($deviceModel)
    {
        if($deviceModel) {
            $deviceModel = DeviceModel::firstOrCreate(['value' => $deviceModel]);
            return $deviceModel->id;
        }
        return null;
    }
}
