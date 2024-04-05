<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FileFacade;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class TempImageController extends Controller
{
   
    public function store(Request $request)
    {
        $image = $request->filepond;
        $validator = Validator::make(["file" => $image], [
            "file" => [
                'required',
                'image',
                File::types(['jpg', 'png', 'jpeg'])->max(2048)
            ]
        ]);

        if ($validator->fails()) {
            return response(["status" => 400, "messages" => $validator->errors()->all()], 422);
        }

        $fileName = $image->hashName();
        $image->move(public_path('temp'), $fileName);
        
        return  public_path('temp/'.$fileName); 
    }

    public function destroy(Request $request)
    {      
        $file = $request->file;
        if (FileFacade::exists($file)) {
            FileFacade::delete($file);
        }
    }
    
}
