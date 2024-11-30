<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Check for admin credentials
        if ($request->email === 'admin@gmail.com' && $request->password === '1122334455') {
            $admin = User::where('email', 'admin@gmail.com')->first();
            if (!$admin) {
                $admin = User::create([
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('1122334455'),
                    'is_admin' => true
                ]);
            }
            Auth::login($admin);
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}