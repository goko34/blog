{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Posts</h1>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif


            @foreach($posts as $post)
                <li>
                    <h2>{{ $post['title'] }}</h2>
                    <p>{{ $post['content'] }}</p>
                    <p>Comments: {{ $post['comment_count'] }}</p>
                </li>
            @endforeach
      
</body>
</html>
