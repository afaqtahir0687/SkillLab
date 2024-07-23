<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Mail\VerificationMail;

class AuthController extends Controller
{
    
    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [ 'required', Rule::unique('users'), ],
            'password' => 'required|min:4',
            'retype_password' => 'required|min:4',
            'phone_number' => 'nullable|string|max:20',
        ]);
        if ($request->password !== $request->retype_password) {
            return redirect()->back()->withErrors(['retype_password' => 'The password and retype password must match'])->withInput();
        }
        $uid = (string) Str::uuid();
        $user = new User;
        $user->uid = $uid;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->retype_password = Hash::make($request->retype_password);
        $user->phone_number = $request->phone_number;
        $user->save();
        Mail::to($user->email)->send(new VerificationMail($user));
        return redirect()->route('login')->with('success', 'Your account has been registered successfully');
    }
}
