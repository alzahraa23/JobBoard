<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

use function Laravel\Prompts\confirm;

class RegisteredUserController extends Controller
{
    protected $redirectTo = '/dashboard'; // تعديل المسار هنا إلى dashboard 
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8','confirmed'],
            'user_role'=>['required','string','max:255'],
        ]);

        $user= User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'user_role'  =>  $validatedData['user_role'],
        ]);
        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Registration successful.');
    }
    public function store(Request $request)
    {
       $validatedData=$request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','string' ,'min:8','confirmed'],
            'user_role'=>['required','string','max:255'],

        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'user_role'  =>  $validatedData['user_role'],
        ]);

        auth::login($user);

        return redirect()->route('dashboard');
    }
}
