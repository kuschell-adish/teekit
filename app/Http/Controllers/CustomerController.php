<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Http\Controllers\UserController;
use App\Models\Customers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    protected $mailtrapEmail;

    public function __construct()
    {
        $this->mailtrapEmail = env('EMAIL');
    }

    public function index(Request $request){
        $email = $request->input('email'); 
        Mail::to($this->mailtrapEmail)->send(new UserMail($email));
        session()->put('email', $email);
        return redirect('/verification');
    }

    public function verification () {
        $email = session('email');
        return view('authentication.verify', ['email' => $email]);
    }

    public function resend () {
        $email = session('email');
        Mail::to($this->mailtrapEmail)->send(new UserMail($email));
        return view('authentication.verify', ['email' => $email]);
    }

    public function forms () {
        $emailExtension = env('EMAIL_EXTENSION');
        $email = session('email');
        if (strpos($email, "@".$emailExtension) === false) {
            return view('customer.fields', ['email' => $email]);
        } else {
            return view('user.fields', ['email' => $email]);
        }
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

            $hashedPassword = hash('sha256', $validated['password']); 
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
            else {
               //NULL in the database
            }
        
            $customer->save();
        
            return view('authentication.login'); 
    }

    public function login (Request $request) {
        $validated = $request->validate([
            "email" => ['required', 'email'], 
            "password" => 'required'
        ]); 
        if (auth()->attempt($validated)){
            $request->session()->regenerate();
            return redirect('/dashboard'); 
        }
        return back()->withErrors(['email' => 'The email and password do not match.'])->onlyInput('email'); 
    }


}

