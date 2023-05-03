@extends('layout.master')
@section('content')
    {{-- Search --}}
    <div class="text-center -mt-5">
        <form action="">
            <input
                class="mx-3 py-2 px-2 shadow focus:ring-0 outline-none shadow-gray-400 border-none rounded-lg text-gray-700  "
                type="search" placeholder="Search" name="name" />
            <select name="category" id="" class="-m-10 border-none rounded-e-lg text-gray-400"
                style="box-shadow: -3px 10px 3px -9px #9ca3af;">
                <option value="" disabled selected>Category </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="submit"
                class="bg-indigo-500 rounded-sm ms-10 py-2 px-3 hover:bg-indigo-500 text-white hover:text-black hover:shadow-indigo-700 shadow cursor-pointer">
        </form>
    </div>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4 mt-20">
            {{-- 1st Line --}}
            <div class="flex justify-between">
                <div>
                    <h1 class="font-bold">What Are You Looking For ?</h1>
                </div>
                <a href="{{ url('/products') }}">
                    <div>
                        <h6 class="text-indigo-500">View More<i
                                class="fa fa-solid fa-greater-than font-thin ms-2 text-sm"></i>
                        </h6>
                    </div>
                </a>
            </div>
            {{-- categories --}}
            <div class="grid grid-cols-3 md:grid-cols-6 gap-2 md:gap-8 mt-10">
                <div class="col-span-1 text-center bg-gray-50 p-2 py-6 md:py-6 md:px-0 rounded-md">
                    <i class="fa fa-solid fa-laptop text-indigo-500 bg-gray-100 p-2 rounded-full md:text-lg md:p-3"></i>
                    <h6 class="text-sm font-semibold mt-3 text-gray-400">Computer</h6>
                </div>
                <div class="col-span-1 text-center bg-gray-50 p-2 py-6 md:py-6 md:px-0 rounded-md">
                    <i class="fa fa-solid fa-mobile text-indigo-500 bg-gray-100 p-2 rounded-full md:text-lg md:p-3"></i>
                    <h6 class="text-sm font-semibold mt-3 text-gray-400">Phone</h6>
                </div>
                <div class="col-span-1 text-center bg-gray-50 p-2 py-6 md:py-6 md:px-0 rounded-md">
                    <i class="fa fa-solid fa-house text-indigo-500 bg-gray-100 p-2 rounded-full md:text-lg md:p-3"></i>
                    <h6 class="text-sm font-semibold mt-3 text-gray-400">Property</h6>
                </div>
                <div class="col-span-1 text-center bg-gray-50 p-2 py-6 md:py-6 md:px-0 rounded-md">
                    <i class="fa fa-solid fa-music text-indigo-500 bg-gray-100 p-2 rounded-full md:text-lg md:p-3"></i>
                    <h6 class="text-sm font-semibold mt-3 text-gray-400">Music</h6>
                </div>
                <div class="col-span-1 text-center bg-gray-50 p-2 py-6 md:py-6 md:px-0 rounded-md">
                    <i class="fa fa-solid fa-shirt text-indigo-500 bg-gray-100 p-2 rounded-full md:text-lg md:p-3"></i>
                    <h6 class="text-sm font-semibold mt-3 text-gray-400">Fashions</h6>
                </div>
                <div class="col-span-1 text-center bg-gray-50 p-2 py-6 md:py-6 md:px-0 rounded-md">
                    <i
                        class="fa fa-solid fa-screwdriver-wrench text-indigo-500 bg-gray-100 p-2 rounded-full md:text-lg md:p-3"></i>
                    <h6 class="text-sm font-semibold mt-3 text-gray-400">Service</h6>
                </div>
            </div>
            {{-- 2nd Line --}}
            <div class="flex justify-between mt-10">
                <div>
                    <h1 class="font-bold">Recent Items</h1>
                </div>
                <div>
                    <h6 class="text-indigo-500">View More <i class="fa fa-solid fa-greater-than font-thin ms-2 text-sm"></i>
                    </h6>
                </div>
            </div>
            {{-- Items --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-10 mt-10">
                @foreach ($items as $item)
                    <a href="{{ url('item/detail', $item->id) }}">


                        <div class="col-span-1  rounded-md my-4 ">
                            <div>
                                <img src="{{ $item->photo_url }}" alt="" class="h-36 md:h-48 mx-auto">
                                <div class="bg-gray-50 p-2 rounded-b-lg shadow">
                                    <div class="flex justify-between mb-1">
                                        <h1 class="font-semibold">{{ $item->name }}</h1>
                                        <h1 class="text-indigo-500 text-sm">{{ $item->condition }}</h1>
                                    </div>
                                    <h6 class="text-xs text-indigo-500 mb-2">${{ $item->price }}</h6>
                                    <div class="flex items-center">
                                        <i class="fa fa-solid fa-user text-white bg-indigo-500 p-1 rounded-full m-1"></i>
                                        <h6 class="text-sm">{{ $item->owner->name }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
