<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Upload extends Controller
{
    public function upload()
    {


        Storage::disk('public_path')->copy('textfile.txt','new/textfile.txt');
        return date('Y-m-d h:i:s',Storage::lastModified('textfile.txt')) ;

        return \request('text');



//        $nicename=[];
//        $i=0;
//        foreach (\request()->file('file') as $file)
//        {
//            $nicename['file'.$i]='The File ('.($i+1).')';
//            $i++;
//        }
//        $this->validate(\request(),['file.*'=>'required|image|mimes:jpg,jpeg,png'],[],$nicename);
//        $files = \request()->file('file');
//        foreach ($files as $file ){
//            $name= $file->getClientOriginalName();
//            $extension= $file->getClientOriginalExtension();
//            $size= $file->getSize();
//            $mimeType= $file->getMimeType();
//            $realpath= $file->getRealPath();
//
//            $file->move(public_path('upload'),'image_'.time().$extension.$name);
//        }

        return back();


    }
}
