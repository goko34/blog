<?php

namespace App\Http\Controllers;

use session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontAuthController extends Controller
{
    protected $apiUrl = 'http://host.docker.internal/api/';

    public function loginview()
    {
        return view('auths.login');
    }
    public function registerview()
    {
        return view('auths.register');
    }
    public function register(Request $request)
    {
        $response = Http::post('http://host.docker.internal:80/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $data = $response->json();
        dd($data);

        if ($response->successful() && isset($data['status']) && $data['status'] == 'success') {
            return redirect()->route('login')->with('success', $data['message']);
        }

    }

    public function login(Request $request)
    {
        $response = Http::post("{$this->apiUrl}login", [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $data = $response->json();
        if ($response->successful() && isset($data['status']) && $data['status'] == 'success') {
            session(['token' => $data['token']]);
            return redirect()->route('home')->with('success', $data['message']);
        } else {
            $message = isset($data['message']) ? $data['message'] : '';
            $errors = isset($data['errors']) ? $data['errors'] : [];
            return redirect()->back()->withErrors($errors)->with('error', $message)->withInput();
        }


    }

    public function logout(Request $request)
    {
        // $token = session('token');

        // if ($token) {
        //     $response = Http::withToken($token)->post("{$this->apiUrl}/logout");

        //     if ($response->successful()) {
        //         session()->forget('token');
        //         return redirect()->route('login')->with('success', 'Logout successful!');
        //     }
        // }

        // return back()->withErrors('Logout failed');
    }
}
