@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<body class="bg-gray-200 font-sans leading-normal tracking-normal">


    <!--Container-->
<div class="container px-4 md:px-0 max-w-6xl mx-auto -mt-32">

        <div class="mx-0 sm:mx-6">
            <div class="bg-gray-200 w-full text-xl md:text-2xl text-gray-800 leading-normal rounded-t">

            <!--Lead Card-->
            <div class="flex h-full bg-white rounded overflow-hidden shadow-lg">
                <a href="post.html" class="flex flex-wrap no-underline hover:no-underline">
                    <div class="w-full md:w-2/3 rounded-t">
                        <img src="cover.jpg" class="h-full w-full shadow">
                    </div>

                    <div class="w-full md:w-1/3 flex flex-col flex-grow flex-shrink">
                        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                            <p class="w-full text-gray-600 text-xs md:text-sm pt-6 px-6">GETTING STARTED</p>
                            <div class="w-full font-bold text-xl text-gray-900 px-6">👋 Welcome fellow Tailwind CSS and Ghost fan</div>
                            <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                This starter template is an attempt to replicate the default Ghost theme "Casper" using Tailwind CSS and vanilla Javascript.
                            </p>
                        </div>

                        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                            <div class="flex items-center justify-between">
                                <img class="w-8 h-8 rounded-full mr-4 avatar" data-tippy-content="Author Name" src="http://i.pravatar.cc/300" alt="Avatar of Author">
                                <p class="text-gray-600 text-xs md:text-sm">1 MIN READ</p>
                            </div>
                        </div>
                    </div>

                </a>
            </div>
            <!--/Lead Card-->


            <!--Posts Container-->
            <div class="flex flex-wrap justify-between pt-12 -mx-6">
                @foreach ($posts as $post)
                    <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                            <a href="" class="flex flex-wrap no-underline hover:no-underline">
                                <img src="{{ $post['image_url'] ?? 'https://source.unsplash.com/collection/225/800x600' }}" class="h-64 w-full rounded-t pb-6">
                                <p class="w-full text-gray-600 text-xs md:text-sm px-6">{{ $post['category']['name'] ?? 'Uncategorized' }}</p>
                                <div class="w-full font-bold text-xl text-gray-900 px-6">{{ $post['title'] }}</div>
                                <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                    {{ $post['excerpt'] ?? Str::limit($post['content'], 150) }}
                                </p>
                            </a>
                        </div>
                        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                            <div class="flex items-center justify-between">
                                <img class="w-8 h-8 rounded-full mr-4 avatar" data-tippy-content="{{ $post['author']['name'] }}" src="{{ $post['author']['avatar_url'] ?? 'http://i.pravatar.cc/300' }}" alt="Avatar of Author">
                                <p class="text-gray-600 text-xs md:text-sm">{{ $post['read_time'] ?? '1 MIN READ' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--/ Post Content-->

        </div>

            <!--Author-->
            <div class="flex w-full items-center font-sans p-8 md:p-24">
                <img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
                <div class="flex-1">
                    <p class="text-base font-bold text-base md:text-xl leading-none">Ghostwind CSS</p>
                    <p class="text-gray-600 text-xs md:text-base">Tailwind CSS version of Ghost's Casper theme by <a class="text-gray-800 hover:text-green-500 no-underline border-b-2 border-green-500" href="https://www.tailwindtoolbox.com">TailwindToolbox.com</a></p>
                </div>
                <div class="justify-end">
                <a href="post.html" class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">Read More</a>
                </div>
            </div>
            <!--/Author-->

    </div>
</div>
</body>
@endsection
