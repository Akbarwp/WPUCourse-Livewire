<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? env("APP_NAME") }}</title>
    <link rel="shortcut icon" href="https://img.daisyui.com/images/profile/demo/yellingwoman@192.webp" type="image/x-icon">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>

<body class="font-plus-jakarta">
    <nav>
        <div class="navbar bg-base-100 shadow-sm">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li><a href="#">Home</a></li>
                        <li><a href="{{ route("users") }}" class="{{ Request::routeIs("users") ? "text-blue-500" : "" }}">Users</a></li>
                        <li><a href="{{ route("games") }}" class="{{ Request::routeIs("games") ? "text-blue-500" : "" }}">Games</a></li>
                    </ul>
                </div>
                <div class="flex items-center gap-2">
                    <img src="https://img.daisyui.com/images/profile/demo/yellingwoman@192.webp" alt="logo" class="avatar w-12 rounded-xl">
                    <a href="{{ route("users") }}" class="text-xl font-semibold">{{ env("APP_NAME") }}</a>
                </div>
            </div>
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1">
                    <li><a href="#">Home</a></li>
                    <li><a href="{{ route("users") }}" class="{{ Request::routeIs("users") ? "text-blue-500" : "" }}">Users</a></li>
                    <li><a href="{{ route("games") }}" class="{{ Request::routeIs("games") ? "text-blue-500" : "" }}">Games</a></li>
                </ul>
            </div>
            <div class="navbar-end">
                <img src="https://img.daisyui.com/images/profile/demo/yellingcat@192.webp" alt="logo" class="avatar w-12 rounded-xl">
            </div>
        </div>
    </nav>

    {{ $slot }}
</body>

</html>
