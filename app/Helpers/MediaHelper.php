<?php

namespace App\Helpers;
use Image;

class MediaHelper {
    public static $diskNames = [
        'general' => 'media',
        'category' => 'media',
        'profile' => 'user_media',
        'product' => 'product_media',
    ];

    public static function uploadMedia($item, $request, $collection = 'images', $type = 'general', $update = false, $key = 'image', $resizeWidth = 1000) {

        \Config::set('medialibrary.disk_name', 'media');
        if (isset($request[$key])) {
            if (is_array($request[$key])) {
                // multiple images
                $images = $request->file($key);
                foreach ($images as $image) {
                    $imageName = self::generateRandomName() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/media'), $imageName);

                    //self::compressImg(public_path() . '/uploads/media/' . $imageName, $resizeWidth);

                    $item->addMedia(public_path() . '/uploads/media/' . $imageName)->toMediaCollection($collection, 'media');
                }
            } else {
                // single image
                if ($update && $item->getFirstMedia($collection)) {
                    // delete old file first
                    @unlink($item->getFirstMedia($collection)->getPath());
                    // delete from media table
                    $item->getFirstMedia($collection)->delete();
                }
                // now create the new image
                $image = $request->file($key);
                $imageName = self::generateRandomName() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/media'), $imageName);

                //self::compressImg(public_path() . '/uploads/media/' . $imageName, $resizeWidth);

                $item->addMedia(public_path() . '/uploads/media/' . $imageName)->toMediaCollection($collection, 'media');
            }
        }
    }

    public static function compressImg($path, $resizeWidth) {
        $img = Image::make($path);
        $imgWidth = $img->width();
        $imgFileSizeInKB = self::convertIntoMB($img->filesize());
        if ($imgWidth >= $resizeWidth) {
            $img->resize($resizeWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path, 60);
        } elseif ($imgFileSizeInKB > 500) {
            $img->save($path, 60);
        }
    }

    public static function convertIntoMB($sizeInBytes) {
        return intval($sizeInBytes / 1024);
    }

    public static function generateRandomName() {
        return time() . rand(10, 10000) . '_' . date('Y_m_d');
    }

    public static function deleteProductImg($image_id) {
        $image = \Spatie\MediaLibrary\MediaCollections\Models\Media::where('id', $image_id)->first();
        if ($image) {
            @unlink(public_path() . '/uploads/product_media/' . $image->file_name);
            $image->delete();
        }
    }
    public static function deleteImg($image_id) {
        $image = \Spatie\MediaLibrary\MediaCollections\Models\Media::where('id', $image_id)->first();
        if ($image) {
            @unlink(public_path() . '/uploads/media/' . $id . '/' . $image->file_name);
            $image->delete();
        }
    }
}
