<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $directory = "upload/images/";
            @unlink(Auth::user()->image);
            $image->move($directory, $imageName);
            $filePath = $directory. $imageName;

            User::where('id', Auth::user()->id)->update([
                'image' => $filePath
            ]);
            return response()->json(['success' => 'Image uploaded successfully']);
        } else {
            return response()->json(['error' => 'No image uploaded'], 400);
        }
    }
}
