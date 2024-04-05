<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\File;

trait imageTrait
{

    protected function uploadImage($newImag, $path, $oldImage = null)
    {
        if (isset($newImag)) {
            $image_name = time() . "_" . $newImag->hashName();
            $newImag->move($path, $image_name);
            return $path . $image_name;
        }
        return $oldImage;
    }

    protected function removeImage($path)
    {
        if (isset($path) && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }

}
