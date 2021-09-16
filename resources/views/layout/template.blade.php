<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full w-full bg-black">
<head>
    @include('layout.header')
</head>
<body class="antialiased w-full h-full" style="background-image: url('/images/tower.jpeg');">
    @if(!request()->has('focus'))
        <div class="w-full h-24 bg-black text-gray-300 text-4xl font-sans p-4 border-b-4 border-yellow-700 flex justify-center items-center">
            @yield('title')
        </div>
    @endif

    <div class="w-full h-full bg-black bg-opacity-80 backdrop-filter backdrop-blur-lg text-gray-300 text-base font-sans p-4">
        @yield('body')
    </div>
</body>
@stack('scripts')
</html>
