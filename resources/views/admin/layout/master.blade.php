<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assigment</title>
    @vite(['../resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('css')
</head>

<body>
    {{-- NavBar  --}}
    {{-- <nav class="flex justify-between fixed w-screen z-10 top-0 py-4 px-5 pt-3 md:px-14 lg:px-20 bg-cyan-600 ">
        <h1 class="text-lg md:text-xl font-bold font-RalewayThin dark:text-white hover:cursor-pointer">
            Assigment
        </h1>

        <ul class="flex items-center text-sm md:text-lg font-RalewayThin text-teal-600 dark:text-white">
            <li class="mx-3">
                Dasboard
            </li>
            <li class="mx-3">
                My Posts
            </li>
            <li class="mx-3">
                User
            </li>
            </li>
        </ul>
    </nav> --}}
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-screen px-3 py-4 overflow-y-auto bg-indigo-100 ">
            <div class="flex items-center">
                <img src="{{ asset('../logo.png') }}" width="50px" class="mx-5 my-6 md:my-7" alt="logo">
                <span class="text-xl">Admin Panel</span>
            </div>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href={{ route('admin.index') }}
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-indigo-500 hover:text-white">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6  transition duration-75  group-hover:text-white "
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg>

                        <span class="ml-3 ">Item</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-indigo-500 hover:text-white">
                        <i class="fa-solid fa-list w-6 h-6  transition duration-75 ">
                        </i>

                        <span class="flex-1 ml-3 whitespace-nowrap">Category</span>
                    </a>
                </li>
            </ul>

            <div class="mt-auto">
                <a href="/logout"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-indigo-500 hover:text-white">
                    <i class="fa-solid fa-list w-6 h-6  transition duration-75 ">
                    </i>

                    <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                </a>
            </div>
        </div>
    </aside>

    <main class="p-4 sm:ml-64">
        @yield('content')
    </main>
    @yield('script')
</body>

</html>
