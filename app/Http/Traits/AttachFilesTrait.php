<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait AttachFilesTrait
{

    public function saveImage(UploadedFile $image, $path)
    {
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        Storage::putFileAs($path, $image, $filename);
        return $filename;
    }

    public function uploadFile($request, $name, $inputName)
    {
        $requestFile = $request->file($inputName);
        try {
            $fixName = $name.'.'.$requestFile->extension();
            $path = 'public/images/'.$name;

            if ($requestFile) {
                Storage::putFileAs($path, $requestFile, $fixName); 
            }

            return true;
        } catch (\Throwable $th) {
            report($th);

            return $th->getMessage();
        }
    }

    public function delete_one_file($disk, $folder) //use to delete folder has one file only
    {
        $path = 'attachments/' . $folder;
        if(!empty($path))
        Storage::disk($disk)->deleteDirectory($path);
    }

    public function deleteFile($disk, $folder,$name )
    {
        $path = Storage::disk($disk)->exists('attachments/',$folder .'/'.$name,);
        if($path)
        {
            Storage::disk($disk)->delete('attachments/',$folder .'/'.$name,);
        }
    }

    public function downloadfile($name)
    {
        return Storage::disk('library')->download('attachments/library/'.$name);
    }

}
