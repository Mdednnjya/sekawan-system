<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sekawan-system</title>
    <link rel="icon" href="{{ asset('images/logo.svg') }}" type="image/icon" />
    @vite(['resources/js/app.js'])
</head>
<body class="bg-gray-50">
<div class="min-h-screen flex flex-col">
    @include('components.header')

    <div class="bg-green-500">blabla</div>
    <main class="flex-grow">
        @yield('content')
    </main>

    @include('components.footer')
</div>
</body>
</html>
