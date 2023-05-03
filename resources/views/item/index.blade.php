@extends('layout.master')
@section('content')
    <div class="grid grid-cols-7 start-1 mt-4 ">
        <div class=" col-start-2 col-span-5">
            {{-- breadscumb --}}
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 my-4 ms-2 py-2 bg-gray-100 px-2 rounded-md">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ url('/') }}"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Home</a>
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
                            <span class="ml-1 text-sm font-medium text-blue-400 md:ml-2 ">Products</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="grid md:grid-cols-7 start-1 mt-4 gap-4">
                <div class="col-span-2">
                    <form action="">
                        <div class="flex justify-between mb-10">
                            <h6 class="font-semibold">Filter By</h6>
                            <a href="{{ url('/products/') }}" class="text-red-500 text-sm font-semibold">Clear Filter</a>
                        </div>
                        <span class="text-gray-500">Sorting</span>
                        <div class="flex flex-wrap mt-4">
                            <div class="flex items-center me-4">
                                <input id="red-radio" type="radio" value="latest" name="sort"
                                    class="w-4 h-4 text-indigo-500 border-gray-300 focus:ring-indigo-500 focus:ring-2">
                                <label for="red-radio" class="ml-2 text-sm font-medium text-gray-500 ">Latest</label>
                            </div>
                            <div class="flex items-center ms-4">
                                <input id="green-radio" type="radio" value="popluar" name="sort"
                                    class="w-4 h-4 text-indigo-500 border-gray-300 focus:ring-indigo-500 focus:ring-2">
                                <label for="green-radio" class="ml-2 text-sm font-medium text-gray-500 ">Popular</label>
                            </div>
                        </div>
                        {{-- Item Name --}}
                        <div class="mt-8 ">
                            <label for="name" class="block mb-2  font-medium text-gray-600 ">Item Name</label>
                            @if ($errors->has('name'))
                                <small class="text-red-600">{{ $errors->first('name') }}</small>
                            @endif
                            <input type="text" name="name" id="name"
                                class="bg-indigo-100 border border-indigo-100 text-gray-900 sm:text-sm rounded-md  focus:outline-none  block w-full p-2.5 "
                                placeholder="Input Name">
                        </div>
                        {{-- Item Price --}}
                        <div class="mt-4 ">
                            <label for="price" class="block mb-2  font-medium text-gray-600 ">Price Range</label>
                            @if ($errors->has('min_price'))
                                <small class="text-red-600">{{ $errors->first('min_price') }}</small>
                                @endif @if ($errors->has('max_price'))
                                    <small class="text-red-600">{{ $errors->first('max_price') }}</small>
                                @endif
                                <div class="grid grid-cols-2 gap-4">
                                    <input type="text" name="min_price" id="min_price"
                                        class="bg-indigo-100 border border-indigo-100 text-gray-900 sm:text-sm rounded-md  focus:outline-none  block w-full p-2.5 "
                                        placeholder="Min">
                                    <input type="text" name="max_price" id="max_price"
                                        class="bg-indigo-100 border border-indigo-100 text-gray-900 sm:text-sm rounded-md  focus:outline-none  block w-full p-2.5 "
                                        placeholder="Max">
                                </div>
                        </div>
                        {{-- Category --}}
                        <div class="mt-4 ">
                            <label for="category" class="block mb-2  font-medium text-gray-600 ">Category</label>
                            @if ($errors->has('category'))
                                <small class="text-red-600">{{ $errors->first('category') }}</small>
                            @endif
                            <select name="category" id="category"
                                class="bg-indigo-100 border border-indigo-100 text-gray-900 sm:text-sm rounded-md  focus:outline-none  block w-full p-2.5 ">
                                <option value="" disabled selected>Choose One</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                <select>
                        </div>
                        {{-- Condition --}}
                        <div class="mt-4 ">
                            <label for="condition" class="block mb-2  font-medium text-gray-600 ">Item Condition</label>
                            @if ($errors->has('condition'))
                                <small class="text-red-600">{{ $errors->first('condition') }}</small>
                            @endif
                            <select name="condition" id="condition"
                                class="bg-indigo-100 border border-indigo-100 text-gray-900 sm:text-sm rounded-md  focus:outline-none  block w-full p-2.5 ">
                                <option value="" disabled selected>Choose One</option>
                                <option value="New">New</option>
                                <option value="Used">Used</option>
                                <option value="Good Second Hand">Good Second Hand</option>

                                <select>
                        </div>
                        {{-- Type --}}
                        <div class="mt-4 ">
                            <label for="type" class="block mb-2  font-medium text-gray-600 ">Type</label>
                            @if ($errors->has('type'))
                                <small class="text-red-600">{{ $errors->first('type') }}</small>
                            @endif
                            <select name="type" id="type"
                                class="bg-indigo-100 border border-indigo-100 text-gray-900 sm:text-sm rounded-md  focus:outline-none  block w-full p-2.5 ">
                                <option value="" disabled selected>Choose One</option>
                                <option value="For Sell">For Sell</option>
                                <option value="For Buy">For Buy</option>
                                <option value="For Exchange">For Exchange</option>
                                <select>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" value="Apply Filter"
                                class="bg-indigo-500 w-full p-2 text-white rounded-md">
                        </div>
                    </form>
                </div>
                <div class="col-span-5">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-10 mt-10">
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
                                                <i
                                                    class="fa fa-solid fa-user text-white bg-indigo-500 p-1 rounded-full m-1"></i>
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

        </div>
    @endsection
