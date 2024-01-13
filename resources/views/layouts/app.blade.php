<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-gray-200 justify-between">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center gap-3">
            <li> <a href="">Home</a></li>
            <li> <a href="{{route('dashboard')}}">Dashboard</a></li>
            <li> <a href="{{route('posts')}}">Posts</a></li>
            
        </ul>
        <ul class="flex items-center gap-3">
            @auth
                <li> <a href="">{{auth()->user()->name}}</a></li>
                <li> 
                   <form action="{{route('logout')}}" class="inline p-3" method="post">
                    @csrf
                    <button  type="submit">Logout</button>
                   </form>
                </li>
            @else
                <li> <a href="{{ route('login') }}">Login</a></li>
                <li> <a href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </nav>

    @yield('content')

</body>

</html>
