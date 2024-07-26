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
        if (isset($data['token'])) {

            // Token varsa, oturum aç ve yönlendir
            Session::put('token', $data['token']);
            return redirect()->route('home'); // Örneğin dashboard rotasına yönlendirme
        }
        return back()->withErrors(['email' => 'Giriş bilgileri hatalı.']);
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

        if ($response->successful()) {
            // Kayıt başarılı
            $data = $response->json();
            // Kullanıcı oturumu ve yönlendirme işlemlerini burada yapabilirsin
            return redirect()->route('login'); // Örneğin login rotasına yönlendirme
        }

        return back()->withErrors(['email' => 'Kayıt sırasında bir hata oluştu.']);
    }
}
