<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking App</title>


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-teal-400 via-blue-500 to-indigo-600 text-gray-900">

<div class="min-h-screen flex flex-col justify-center items-center">

    <h1 class="text-5xl font-semibold text-yellow-100 mb-6">
        Welcome to our Booking App
    </h1>


    <div class="flex space-x-4">

        <a href="/login" class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-blue-600 transition-colors">
            Login
        </a>


        <a href="/register" class="bg-green-500 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-green-600 transition-colors">
            Register
        </a>
    </div>
</div>

</body>
</html>
