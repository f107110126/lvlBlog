<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function posted()
    {
        // dd(Input::file('UploadFile'));
        // 確認檔案是否有上傳
        if (request()->hasFile('UploadFile')) {
            // 取得檔案
            $file = request('UploadFile');
            // 移動檔案:
            // $file->move('uploads');
            // $file->move('uploads', 'filename');
            // $file->move('uploads', $file->originalName);
            // print $file->getClientOriginalName();
            $uploadName = $file->getClientOriginalName();
            $file->move('uploads', $uploadName);
            // return redirect('uploads/'.$uploadName); // this is work too

            /*
             * //Display File Name
             * echo 'File Name: '.$file->getClientOriginalName();
             * echo '<br>';
             *
             * //Display File Extension
             * echo 'File Extension: '.$file->getClientOriginalExtension();
             * echo '<br>';
             *
             * //Display File Real Path
             * echo 'File Real Path: '.$file->getRealPath();
             * echo '<br>';
             *
             * //Display File Size
             * echo 'File Size: '.$file->getSize();
             * echo '<br>';
             *
             * //Display File Mime Type
             * echo 'File Mime Type: '.$file->getMimeType();
             *
             * //Move Uploaded File
             * $destinationPath = 'uploads';
             * $file->move($destinationPath,$file->getClientOriginalName());
             */
            return redirect('/uploads/'.$uploadName);
        } else {
            return 'no file specified.';
        }
    }
}
