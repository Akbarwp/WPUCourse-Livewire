<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Users</title>
    <link rel="shortcut icon" href="https://img.daisyui.com/images/profile/demo/yellingwoman@192.webp" type="image/x-icon">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>

<body>
    {{-- example 1 --}}
    {{-- @livewire('users') --}}
    {{-- @livewire('user-list', ['lazy' => true]) --}}

    {{-- example 2 --}}
    {{-- <livewire:users /> --}}

    <div class="hero bg-base-200 min-h-screen">
        @if (session("success"))
            <div class="toast toast-top toast-end">
                <div class="alert alert-success">
                    <span>{{ session("success") }}</span>
                </div>
            </div>
        @endif
        <div class="hero-content w-full flex-col lg:flex-row-reverse">
            {{--? How to make skeleton component, or lazy loading --}}
            <livewire:user-list lazy />
            <livewire:user-register-form />
        </div>
    </div>
</body>

</html>
