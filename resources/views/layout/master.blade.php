<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment</title>
    @vite(['./resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @yield('css')
</head>

<body>
    {{-- NavBar  --}}
    {{-- <nav class="flex justify-between fixed w-screen z-10 top-0 py-5 px-5 pt-6 md:px-14 lg:px-20 bg-cyan-600 ">
        <h1 class="text-lg md:text-xl font-bold font-RalewayThin dark:text-white hover:cursor-pointer">
            Assignment
        </h1>

        <ul class="flex items-center text-sm md:text-lg font-RalewayThin text-teal-600 dark:text-white">
            <li></li>
            <li>
                <form action="">
                    <input class="mx-3 py-2 px-2 bg-gray-100 border-teal-400 rounded-lg text-gray-700 outline-none"
                        type="search" />
                    <input type="submit" name="search"
                        class="bg-cyan-950 rounded-md py-2 px-3 hover:bg-cyan-500 hover:text-black hover:shadow-cyan-700 shadow cursor-pointer">
                </form>

            </li>
        </ul>
    </nav> --}}
    <div class="">
        <img src="{{ asset('/bg2.jpg') }}" class="w-full h-full">
    </div>
    <main>
        @yield('content')
    </main>
    @yield('script')
</body>

</html>
