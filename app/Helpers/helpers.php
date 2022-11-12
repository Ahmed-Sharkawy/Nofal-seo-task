<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('uploadFile')) {
    function uploadFile($file, $path)
    {
        $ext = $file->extension();
        $imageName = date('Y-m-d') . '_' . uniqid() . '.' . $ext;
        $pathUrl = $file->storeAs($path, $imageName);

        return $pathUrl;
    }
}

if (! function_exists('deletFile')) {
    function deletFile($path)
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
}
