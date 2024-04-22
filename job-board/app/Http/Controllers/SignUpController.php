<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SignUpController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.signup');
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|regex:/^(?=.*[a-zA-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/',
        ]);

        // Create a new user record
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = now(); // Assuming email verification is immediate
        $user->remember_token = Str::random(10);
        $user->save();

        // Redirect the user after successful sign-up
        return redirect()->route('auth.create')->with('success', 'Sign up successful! - Log-In');
    }

}
