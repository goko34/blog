@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<body class="bg-gray-200">
    <div class="container mx-auto mt-5">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="mt-4">
                    @if ($errors->any())
                        <div class="w-full">
                            @foreach ($errors->all() as $error)
                                <div class="bg-red-500 text-white p-3 rounded mb-4">
                                    <button type="button" class="float-right text-white" onclick="this.parentElement.style.display='none'">
                                        &times;
                                    </button>
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-500 text-white p-3 rounded mb-4">
                            <button type="button" class="float-right text-white" onclick="this.parentElement.style.display='none'">
                                &times;
                            </button>
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-3 rounded mb-4">
                            <button type="button" class="float-right text-white" onclick="this.parentElement.style.display='none'">
                                &times;
                            </button>
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="bg-white shadow-md rounded-lg">
                    <div class="text-center font-bold text-xl py-4">
                        Login
                    </div>
                    <div class="p-6">
                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700">Email address</label>
                                <input type="text" class="w-full p-2 border border-gray-300 rounded mt-1" name="email">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">Password</label>
                                <input type="password" class="w-full p-2 border border-gray-300 rounded mt-1" name="password">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700">If you haven't created an account yet</label>
                                <a href="{{ route('register') }}" class="text-blue-500">register &rarr;</a>
                            </div>
                            <div class="text-center">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded mt-3" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
