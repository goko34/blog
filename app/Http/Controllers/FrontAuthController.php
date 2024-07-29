<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class FrontAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auths.login');
    }
    public function login(Request $request)
    {
        $response = Http::post('http://host.docker.internal:80/api/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        $data = $response->json();
        
        if (isset($data['original']['token'])) {
            Session::put('token', $data['original']['token']);
            return redirect()->route('home')->with('success', $data['original']['message']);
        }
        return redirect()->back()->with('error', $data['original']['message']);
    }

    public function showRegisterForm()
    {
        return view('auths.register');
    }

    public function register(Request $request)
    {
        $response = Http::post('http://host.docker.internal:80/api/register', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
        ]);
        $data = $response->json();
        if (isset($data['original']['status'])) {
            return redirect()->route('login')->with('success', $data['original']['message']);
        }else {
            return redirect()->back()->with('error', 'Registration Failed');
        }
    }
}
