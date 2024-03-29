<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
Use App\Image;

class ImageController extends Controller
{
        public function index()
        {
            return view('image');
        }
      
        public function save(Request $request)
        {
           request()->validate([
                'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);
           if ($files = $request->file('fileUpload')) {
               $destinationPath = 'public/image/'; // upload path
               $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
               $files->move($destinationPath, $profileImage);
               $insert['image'] = "$profileImage";
            }
            $check = Image::insertGetId($insert);
     
            return Redirect::to("image")
            ->withSuccess('Great! Image has been successfully uploaded.');
     
        }
}
