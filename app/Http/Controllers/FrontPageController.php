<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\riskprofile;
use App\Models\Image;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
class FrontPageController extends Controller
{
    //
    public function index()
    {
        $riskProfiles  = riskprofile::all();
        $profile_image = Auth::user()->profile_image;
        $images = Image::all();
 
  
        // return Inertia::render('Welcome', ['riskProfiles' => $riskProfiles]);
        return Inertia::render('test', ['riskProfiles' => $riskProfiles,'profile_image'=>$profile_image, 'images'=>$images]);

    }
}
