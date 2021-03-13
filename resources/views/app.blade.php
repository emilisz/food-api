<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="antialiased">
    @include('navbar')

    <div class="flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">



        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 pt-16">

            @yield('content')

            <div class="flex justify-center my-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left mr-5">
                    <a href="{{ URL::previous() }}" class="px-3 py-2 bg-gray-300 rounded shadow border hover:bg-gray-800 hover:text-white">Back</a>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>

        </div>
    </div>
</body>

</html>