<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $validated = $request->validate([
            "profile_picture" => 'image|mimes:jpeg,png,bmp,tiff|max:2048', 
            "email" => ['required', Rule::unique('users', 'email')],
            'password' => [
                'required',
                'string',
                'min:8',             
                'regex:/[a-z]/',      
                'regex:/[A-Z]/',      
                'regex:/[0-9]/',     
                'regex:/[@$!%*#?&]/', 
            ],
           "confirm_password" => 'required|string|same:password',
            "first_name" => ['required'],
            "last_name" => ['required'],
            "company" => ['required'],
            "department" => ['required'],
            "position" => ['required'],
        ]); 

        $hashedPassword = hash('sha256', $validated['password']); 
        $validated['password'] = $hashedPassword;
        unset($validated['confirm_password']);
    
        $user = new User();
        $user->fill($validated);
    
        if ($request->hasFile('profile_picture')) {
            $request->validate([
                "profile_picture" => 'mimes:jpeg,png,bmp,tiff|max:2048'
            ]); 
            $uploadedFile = $request->file('profile_picture');
            $imagePath = $uploadedFile->store('profile_picture', 'public'); 
            $user->profile_picture = $imagePath;
        }
        else {
           //NULL in the database
        }
    
        $user->save();
    
        return view('authentication.login'); 
    } 
}
