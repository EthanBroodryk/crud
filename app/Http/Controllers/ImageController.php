<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class ImageController extends Controller
{
    //

    public function storeImages(Request $request)

    {

        
        $image = $request->image;
        $imageName = $request->image->getClientOriginalName();

        $destinationDirectory = public_path('images'); // Use Laravel's public_path() helper to get the absolute path to the public directory and append the 'images' directory.
        $imageFile = 'images/'; // Remove the leading slash as it's not necessary when appending to $imageFile.
        
        if ($image->move($destinationDirectory, $imageName)) {
            // Use Laravel's storage path when saving file paths in the database to ensure portability.
            Image::create(['filename' => storage_path('app/public/' . $imageFile . $imageName)]);
        }

    
        return Redirect::to('/');
        

    }
}
