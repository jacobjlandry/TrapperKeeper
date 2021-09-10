<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full w-full bg-black">
<head>
    @include('layout.header')
</head>
<body class="antialiased w-full h-full">
    <div class="w-full h-48 text-gray-300 text-4xl font-sans p-4 border-b-4 border-yellow-700 flex justify-center items-center">
        @yield('title')
    </div>

    <div class="w-full text-gray-300 text-base font-sans p-4">
        @yield('body')
    </div>
</body>
@stack('scripts')
</html>
