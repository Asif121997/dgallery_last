<?php
namespace App\Helpers;
use Intervention\Image\Facades\Image;

class ImageProcessor
{
    public static function processAndStoreImages($image)
    {
        $imageOriginal = Image::make($image);
//        $imageOriginalData = (string) $imageOriginal->encode();
        return $imageOriginal;
    }

    public static function processAndStoreWatermarkedImage($image, $waterMarkUrl,$aspectRation = false)
    {
        $watermarkedImage = Image::make($image);

        // Get the original width and height
        $originalWidth = $watermarkedImage->width();
        $originalHeight = $watermarkedImage->height();

        // Calculate the new dimensions while maintaining the aspect ratio
        $newWidth = $originalWidth;
        $newHeight = $originalHeight;

        if ($originalWidth > 1000 || $originalHeight > 1000) {
            // If either width or height is more than 1000px, resize accordingly
            if ($originalWidth > $originalHeight) {
                $newWidth = 1000;
                $newHeight = null; // Auto calculate height to maintain aspect ratio
            } else {
                $newHeight = 1000;
                $newWidth = null; // Auto calculate width to maintain aspect ratio
            }
        }

        // Resize the image
        $watermarkedImage->resize($newWidth, $newHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize(); // Prevent stretching the image
        })->insert($waterMarkUrl, 'center');


//        $watermarkedImageData = (string) $watermarkedImage->encode();
        return $watermarkedImage;
    }

    public static function processAndStoreResizedImage($image, $width, $height, $aspectRation = true)
    {
        $resizedImage = Image::make($image);

        if($aspectRation){
            $resizedImage->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }else{
            $resizedImage->resize($width, $height);
        }

//        $resizedImageData = (string) $resizedImage->encode();
        return $resizedImage;
    }
}
