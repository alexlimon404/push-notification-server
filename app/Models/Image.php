<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";

    public static function uploadImage($image, $userId)
    {
        $nameImage = date('z')
            .'day_'
            .date('G-i-s')
            .'_'
            .$image->getClientOriginalName();
        $imageUrl= date('Y') . '/' .date('W');
        $destinationPath = public_path('images/') . $imageUrl;
        $image->move($destinationPath, $nameImage);
        //Write the address to the database
        $imagePath = new Image();
        $imagePath->user_id = $userId;
        $imagePath->image_path = $imageUrl . '/' . $nameImage;
        $imagePath->save();
        return $imagePath;
    }
}
