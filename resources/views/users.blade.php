<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? "Page Title" }}</title>
</head>

<body>
    {{-- example 1 --}}
    {{-- @livewire('users') --}}

    {{-- example 2 --}}
    <livewire:users />
</body>

</html>
