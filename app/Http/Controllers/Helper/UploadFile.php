<?php

namespace App\Http\Controllers\Helper;

use File; // File ??
use Storage; // Storage ??
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadFile extends Controller
{
    public static function storage($file, $folder = 'berkas/', $fpath = 'public/') // ini sampai bawah masih blom mengerti 
    {
        if ($file) {
            $name = md5(\Carbon\Carbon::now()).'.'.$file->getClientOriginalExtension();
            $fileUpload = $file;
            $path = $fpath.$folder.date('Y/m/');

            if (!is_dir($path)) {
                Storage::makeDirectory($path,0777);
            }
            Storage::putFileAs($path,$fileUpload,$name);
            $filePath = $folder.date('Y/m/').$name;
        } else {
            $filePath = null;
        }
        return $filePath;
    }

    public static function file($file, $folder = 'berkas/')
    {
        if ($file) { // jikalau ada inputannya dia baru nginput
            $name = md5(\Carbon\Carbon::now()).'.'.$file->getClientOriginalExtension(); // dan namanya dia ubah ke tanggal sekarang
            $fileUpload = $file;
            $path = $folder.date('Y/m/');

            if (!is_dir($path)) {
                File::makeDirectory($path,0777,true);
            }
            $file->move($path,$name);
            $filePath = $folder.date('Y/m/').$name;
        } else {
            $filePath = null;
        }
        return $filePath;
    }
}
