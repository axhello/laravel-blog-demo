<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use YuanChao\Editor\EndaEditor;

class UploadController extends Controller
{
    public function uploadImage()
    {
        $data = EndaEditor::uploadImgFile('uploads/images');
        return json_encode($data);
    }
}
