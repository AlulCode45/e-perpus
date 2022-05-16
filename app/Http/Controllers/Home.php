<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //check user_type student or teacher
        $user_type = $request->user_type;
        if ($user_type == 'student') {
            $userCredentials = $request->only('email', 'password');
            if (Auth::guard('student')->attempt($userCredentials)) {
                return redirect()->intended('/student');
            } else {
                return redirect()->back()->withInput()->with('error', 'Wrong email or password');
            }
        } elseif ($user_type == 'teacher') {
            $userCredentials = $request->only('email', 'password');
            if (Auth::guard('teacher')->attempt($userCredentials)) {
                return redirect()->intended('/teacher');
            } else {
                return redirect()->back()->withInput()->with('error', 'Wrong email or password');
            }
        } else {
            return redirect()->back()->with('error', 'User type not found');
        }
    }
    public function register()
    {
        return view('auth.register');
    }
    public function register_action(Request $request)
    {
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function view_book($title)
    {
        $file = BooksModel::where('title', $title)->first()->file_name;
        if ($file == null) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
        if (file_exists(public_path('book/' . $file))) {
            $path = public_path('book/' . $file);
            $header = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $file . '"'
            ];
            return response()->file($path, $header);
        } else {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
    }
}
