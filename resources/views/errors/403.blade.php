<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
<body class="font-sans antialiased">
<main class="h-screen w-full flex flex-col justify-center items-center bg-[#1A2238]">
    <h1 class="text-9xl font-extrabold text-white tracking-widest">403</h1>

    <button class="mt-5">
        <a href="/" class="relative inline-block text-4xl font-medium text-[#FF6A3D] group active:text-orange-500 focus:outline-none focus:ring">
            Go Home
        </a>
    </button>
</main>
</body>
</html>
