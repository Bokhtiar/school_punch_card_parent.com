<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;


class ImageHelpers
{
    public static function resizeImage($file, $width = 800, $height = null)
    {
        $image = Image::make($file);
        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        return $image;
    }

    public static function saveImage($image, $storagePath, $fileName)
    {
        // Construct the full path
        $fullPath = public_path($storagePath . '/' . $fileName);
        // Ensure directory exists
        $directory = dirname($fullPath);
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        // Save the image
        $image->save($fullPath);
        // Return the relative path
        return $storagePath . '/' . $fileName;
    }
}
