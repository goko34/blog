<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Tailwind Starter Template - Ghostwind CSS')</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root{::-webkit-scrollbar{height:10px;width:10px}}
        ::-webkit-scrollbar-track{background:#efefef;border-radius:6px}
        ::-webkit-scrollbar-thumb{background:#d5d5d5;border-radius:6px}
        ::-webkit-scrollbar-thumb:hover{background:#c4c4c4}
    </style>
    @stack('styles')
</head>
<body class="bg-gray-200 font-sans leading-normal tracking-normal">


    <main>
        @yield('content')
    </main>



    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script>
        //Init tooltips
        tippy('.avatar')
    </script>
    @stack('scripts')
</body>
</html>
