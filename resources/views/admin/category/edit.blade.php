@extends('admin.layout.master')
@section('content')
    <section>
        <div class=" flex-row-reverse hidden sm:flex">
            <a href="" class="">
                <i class="fa fa-solid fa-user bg-indigo-500 p-2 rounded-full text-white"></i>
            </a>
        </div>
        <hr class="my-2">

        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li>
                    <div class="flex items-center">
                        <a href="{{ url('/category') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Categories</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-cyan-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-blue-400 md:ml-2 ">Add Categories</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mt-4 bg-indigo-100 rounded-md p-2">
            <h5 class="text-xl ">Add Categories</h5>
        </div>
        <div class="md:w-1/2">
            <form action={{ route('category.update', $category->id) }} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mt-4 ">
                    <label for="name" class="block mb-2  font-medium text-gray-600 ">Category <span
                            class="text-red-700">*</span></label>
                    @if ($errors->has('name'))
                        <small class="text-red-600">{{ $errors->first('name') }}</small>
                    @endif
                    <input type="name" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 "
                        value="{{ $category->name }}">
                </div>
                <div class="mt-4">
                    <label for="photo" class="block mb-2  font-medium text-gray-600 ">Category Photo <span
                            class="text-red-700">*</span></label>
                    <small class="text-gray-400 m">Recomanded Size 400 x 600</small>
                    @if ($errors->has('photo'))
                        <small class="text-red-600">{{ $errors->first('photo') }}</small>
                    @endif
                    <input type="file" name="photo" id="photo"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 mt-1 "
                        placeholder="Input Name">
                    <img src={{ $category->photo_url }} alt="photo" class="h-32">
                </div>
                <div class="mt-4">
                    <label for="status" class="block mb-2  font-medium text-gray-600 ">Status</label>
                    <div class="flex items-center">
                        <input id="status" type="checkbox" name="status" value="publish"
                            @if ($category->status == 'publish') checked @endif
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2">
                        <label for="status" class="ml-2 text-sm text-gray-600 ">Publish</label>
                    </div>
                </div>
                <div class="mt-4 flex flex-row-reverse">
                    <input type="submit" value="Save"
                        class="p-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 cursor-pointer">
                    <button class=" p-2 rounded-md mx-2 text-indigo-400">Cancel</button>
                </div>
            </form>
        </div>
    </section>
@endsection
