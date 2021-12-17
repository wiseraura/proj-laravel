<?php

namespace Helper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ThumbHelper
{
    public static function get_image_slider_url($image = null) {
        if($image != null)
            return asset('images/slider/'.$image);
        else
            return asset('admin/assets/images/no_image.png');
    }

    public static function get_image_post_url($image = null) {
        if($image != null)
            return asset('images/post/'.$image);
        else
            return asset('admin/assets/images/no_image.png');
    }

    public static function get_image_avatar_url($image = null) {
        if($image != null)
            return asset('images/user/'.$image);
        else
            return asset('images/user/no_avatar.jpg');
    }

    public static function get_image_product_url($image = null) {
        if($image != null)
            return asset('images/products/'.$image);
        else
            return asset('images/user/no_avatar.jpg');
    }

    public function uploadThumb($thumbObj, $folderUpload) {
        $thumbName = Str::random(10) . '.' . $thumbObj->clientExtension();
        $thumbObj->storeAs($folderUpload, $thumbName, "storage_image");
        return $thumbName;
    }

    public function deleteThumb($thumbName, $folderUpload){
        Storage::disk('storage_image')->delete($folderUpload . '/'. $thumbName);
    }
}
