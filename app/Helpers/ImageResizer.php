<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class ImageResizer
{
    public static function resizeAndSaveImage($file, $folder)
    {

        // To fix

        // $image = Image::make($file)->resize(300, 300);
        // $filename = time() . '.' . $file->getClientOriginalExtension();
        // $path = public_path('storage/' . $folder . '/' . $filename);
        // $image->save($path);
        // return $folder . '/' . $filename;
    }
}
