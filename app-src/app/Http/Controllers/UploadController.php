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
            return redirect('uploads/'.$uploadName);
        } else {
            return 'no file specified.';
        }
    }
}
