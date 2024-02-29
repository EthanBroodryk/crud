<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {

        
        $profile_pic = $request->profile_pic;
        $imageName = $request->profile_pic->getClientOriginalName();
        $user_id = $request->user_id;
        $name = $request->name;
        $email = $request->email;
        $user = User::find($user_id);
        $destinationDirectory = '/home/ethan/Documents/crud3/public/images';
        $imageFile = '/images/';

        if($name == '' || $email == ''){
            $name = Auth::user()->name;
            $email = Auth::user()->email;
        }
 
        if ($profile_pic->move($destinationDirectory, $imageName)) {
            
            $user->update([
                'name'=>$name,
                'email'=>$email,
                'profile_image'=>$imageFile.$imageName
                
            ]);
        }
    
    
        return Redirect::to('/');

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
