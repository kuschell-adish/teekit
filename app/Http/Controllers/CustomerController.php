<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Http\Controllers\UserController;
use App\Models\Customers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    protected $mailtrapEmail;

    public function __construct()
    {
        $this->mailtrapEmail = env('EMAIL');
    }

    public function forms () {
        return view ('customer.fields'); 
    }

    public function register(Request $request) {
            $validated = $request->validate([
                "profile_picture" => 'image|mimes:jpeg,png,bmp,tiff|max:2048', 
                "email" => ['required', Rule::unique('customers', 'email')],
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
                "position" => ['required'],
            ]); 

            $hashedPassword = Hash::make($validated['password']);
            $validated['password'] = $hashedPassword;
            unset($validated['confirm_password']);
        
            $customer = new Customers();
            $customer->fill($validated);
        
            if ($request->hasFile('profile_picture')) {
                $request->validate([
                    "profile_picture" => 'mimes:jpeg,png,bmp,tiff|max:2048'
                ]); 
                $uploadedFile = $request->file('profile_picture');
                $imagePath = $uploadedFile->store('profile_picture', 'public'); 
                $customer->profile_picture = $imagePath;
            }
            $customer->save();
            Mail::to($this->mailtrapEmail)->send(new UserMail($validated['email']));
            $request->session()->put('email', $validated['email']);
            return view('authentication.login'); 
    } 


}

