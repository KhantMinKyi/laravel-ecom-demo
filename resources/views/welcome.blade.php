@extends('layout.master')
@section('content')
    <div class="">
        <img src="{{ asset('/bg2.jpg') }}" class="w-full h-full">
    </div>
    <div class="text-center -m-5">
        <form action="">
            <input
                class="mx-3 py-2 px-2 shadow focus:ring-0 outline-none shadow-gray-400 border-none rounded-lg text-gray-700  "
                type="search" placeholder="Search" />
            <select name="category" id="" class="-m-10 border-none rounded-e-lg text-gray-400"
                style="box-shadow: -3px 10px 3px -9px #9ca3af;">
                <option value="" disabled selected>Category </option>
            </select>
            <input type="submit"
                class="bg-indigo-500 rounded-sm ms-10 py-2 px-3 hover:bg-indigo-500 text-white hover:text-black hover:shadow-indigo-700 shadow cursor-pointer">
        </form>
    </div>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4 mt-20">
            hi
        </div>
    </div>
@endsection
