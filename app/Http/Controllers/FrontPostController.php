<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class FrontPostController extends Controller
{
    protected $apiBaseUrl = 'http://host.docker.internal:80/api/';

    public function indexview()
    {
        return view('home');
    }
    public function index()
{
    try {

        $response = Http::withToken(session('token'))->get($this->apiBaseUrl . 'posts');

        $data = $response->json();
        dd($data);


        Log::info('API Response:', $data);

        if ($response->successful() && $data['original']['status'] === 'success') {
            return view('post', [
                'posts' => $data['original']['posts']
            ]);
        } else {
            Log::error('API Response Error:', $data);
            return redirect()->route('post')->with('error', 'Post Error');
        }
    } catch (\Exception $e) {
        Log::error('Exception:', ['message' => $e->getMessage()]);
        return redirect()->route('post')->with('error', 'Unexpected Error: ' . $e->getMessage());
    }
}



    public function create()
    {
        try {
            if (!session('token')) {
                return redirect()->route('login')->with('error', 'Ürün oluşturmak için giriş yapmalısınız.');
            }
            return view('products.create');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $response = Http::withToken(session('token'))->post($this->apiBaseUrl . 'products', $request->all());
            $data = $response->json();

            if ($response->successful() && isset($data['status']) && $data['status'] === 'success') {
                return redirect()->route('products.home')->with('success', $data['message']);
            } else {
                $errors = isset($data['errors']) ? $data['errors'] : [];
                $message = isset($data['message']) ? $data['message'] : '';
                return redirect()->back()->withErrors($errors)->with('error', $message)->withInput();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function detail($id)
    {
        try {
            $response = Http::withToken(session('token'))->get($this->apiBaseUrl . 'products/' . $id);
            $data = $response->json();

            if ($response->successful() && isset($data['status']) && $data['status'] === 'success') {
                return view('products.detail', ['product' => $data['product']]);
            } else {
                return redirect()->route('products.home')->with('error', 'Ürün bulunamadı.');
            }
        } catch (\Exception $e) {
            return redirect()->route('products.home')->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $response = Http::withToken(session('token'))->get($this->apiBaseUrl . 'products/' . $id);
            $data = $response->json();

            if ($response->successful() && isset($data['status']) && $data['status'] === 'success') {
                return view('products.update', ['product' => $data['product']]);
            } else {
                return redirect()->route('products.home')->with('error', 'Ürün bulunamadı.');
            }
        } catch (\Exception $e) {
            return redirect()->route('products.home')->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $response = Http::withToken(session('token'))->put($this->apiBaseUrl . 'products/' . $id, $request->all());
            $data = $response->json();

            if ($response->successful() && isset($data['status']) && $data['status'] === 'success') {
                return redirect()->route('products.home')->with('success', $data['message']);
            } else {
                $errors = isset($data['errors']) ? $data['errors'] : [];
                $message = isset($data['message']) ? $data['message'] : '';
                return redirect()->back()->withErrors($errors)->with('error', $message)->withInput();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $response = Http::withToken(session('token'))->delete($this->apiBaseUrl . 'products/' . $id);
            $data = $response->json();

            if ($response->successful() && isset($data['status']) && $data['status'] === 'success') {
                return redirect()->route('products.home')->with('success', $data['message']);
            } else {
                return redirect()->route('products.home')->with('error', 'Ürün silinemedi.');
            }
        } catch (\Exception $e) {
            return redirect()->route('products.home')->with('error', 'Bir hata oluştu: ' . $e->getMessage());
        }
    }
}
