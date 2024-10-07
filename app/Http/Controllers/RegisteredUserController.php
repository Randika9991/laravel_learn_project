<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate the input fields
        $attributes = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'   => ['required', 'confirmed', Password::defaults()],
        ]);

        // Hash the password before storing it
        $attributes['password'] = bcrypt($attributes['password']);

        // Create the user
        $user = User::create($attributes);


        if ($user) {
            Auth::login($user);
            return view('auth.login');
        } else {
            return back()->with('error', 'User creation failed.');
        }
    }

}
