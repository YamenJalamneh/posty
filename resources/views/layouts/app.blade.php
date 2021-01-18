<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>laravel auth</title>
</head>
<body class="bg-gray-100">
<nav class="p-6 bg-white flex justify-between">
    <ul class="flex items-center">
        <li>
            <a href="" class="p-3">Home</a>
        </li>
        <li>
            <a href="{{route('dashboard')}}" class="p-3">Dashboard</a>
        </li>
        <li>
            <a href="{{route('posts')}}" class="p-3">Posts</a>
        </li>
    </ul>

    <ul class="flex items-center">
        @auth()
            <li>
                <a href="{{route('users.posts',auth()->user())}}" class="p-3">{{auth()->user()->name}}</a>
            </li>
            <li>
                <form action="{{route('logout')}}" method="POST" class="p-3 inline">
                    @csrf
                    <button type="submit">logout</button>
                </form>

            </li>
        @endauth

        @guest()
            <li>
                <a href="{{route('login')}}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{route('register')}}" class="p-3">Register</a>
            </li>
        @endguest
    </ul>

</nav>

<div class="container mx-auto mt-6 px-6">
    @yield('content')
</div>

</body>
</html>
