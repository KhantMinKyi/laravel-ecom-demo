@extends('layout.master')
@section('css')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="src/leaflet.css" />
    <link rel="stylesheet" href="dist/leaflet-locationpicker.src.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection
@section('content')
    <div class="grid grid-cols-7 start-1 mt-4 ">
        <div class=" col-start-2 col-span-5">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 my-4 ms-2 py-2 bg-gray-100 px-2 rounded-md">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ url('/') }}"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Home</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ url('/products') }}"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Categories</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="#"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">{{ $item->category->name }}</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-blue-400 md:ml-2 ">{{ $item->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-gray-300 w-full mb-4">
                <img src={{ $item->photo_url }} class="mx-auto h-60 md:h-80">
            </div>
            <div class="grid md:grid-cols-2 gap-10">
                <div>
                    <h6 class="text-lg font-semibold">{{ $item->name }}</h6>
                    <span class="text-indigo-500 text-sm font-semibold">${{ $item->price }}</span>
                    <div>
                        <table class="mt-4 mb-8">
                            <thead class="pb-7">
                                <tr>
                                    <td class="pb-6 font-normal">Type</td>
                                    <td class="ps-2 font-normal pb-6">Condition</td>
                                    <td class="ps-2 font-normal pb-6">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span
                                            class="bg-red-100 text-red-500 font-semibold rounded-md p-1 me-5">{{ $item->type }}</span>
                                    </td>
                                    <td><span
                                            class="bg-blue-100 text-blue-500 font-semibold rounded-md p-1 me-5">{{ $item->type }}</span>
                                    </td>
                                    <td><span
                                            class="bg-green-100 text-green-500 font-semibold rounded-md p-1 me-5">{{ $item->type }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- Highlighted Information  --}}
                    <h5 class="text-lg font-semibold my-2">Highlighted Information</h5>
                    <span class="text-gray-500 ps-4">Lorem ipsum dolor sit amet consectetur adipisic</span>
                    {{-- Product Description --}}
                    <h5 class="text-lg font-semibold mt-4 mb-2">Product Description</h5>
                    <span class="text-gray-500 ps-4">{!! $item->description !!}</span>
                    {{-- Owner Information --}}
                    <h5 class="text-lg font-semibold mt-4 mb-2">Owner Information</h5>
                    <div class=" shadow p-2 my-6">
                        <h5 class="text-lg ms-2 mt-4 mb-2 text-gray-600"><i class="fa fa-solid fa-phone me-2"></i> Contact
                            Number
                        </h5>
                        <h5 class="text-lg ms-2 mt-4 mb-2 text-gray-600">+95{{ $item->owner->phone }}</h5>
                    </div>
                    {{-- Owner Name --}}
                    <div class=" bg-indigo-100 p-2 flex items-center rounded-lg">
                        <i class="fa fa-soild fa-user bg-black text-white p-2 rounded-full m-4"></i>
                        <div>
                            <h6 class="font-semibold">{{ $item->owner->name }}</h6>
                            <span class="text-sm text-gray-500">{{ $item->owner->address }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h6 class=""><i class="fa fa-solid fa-location-dot text-xl "></i> Location</h6>
                    <h6 class="text-sm text-black my-2 font-semibold">{{ $item->owner->address }}</h6>
                    <div id="map" class="h-screen"></div>


                </div>





            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="src/jquery.min.js"></script>
    <script src="src/leaflet.js"></script>
    <script src="dist/leaflet-locationpicker.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet-src.js"
        integrity="sha512-fpi1rrlFr2rHd73hMSMXVnwSHViuYx19zS0NDn6awKeMuQZk7JU4UpyR44bSqGZxzDMzBnVEewram7ZGwhRbZQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.3/leaflet-src.js.map"></script>
    <script>
        var map = L.map('map').setView([{{ $item->owner->latitude }}, {{ $item->owner->longitude }}], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([{{ $item->owner->latitude }}, {{ $item->owner->longitude }}]).addTo(map)
            .bindPopup('Owner Location')
            .openPopup();
        map.on('click', function(e) {
            alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        });
    </script>
@endsection
