@extends('admin.layout.master')
@section('css')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="src/leaflet.css" />
    <link rel="stylesheet" href="dist/leaflet-locationpicker.src.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection
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
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Items</a>
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
                        <span class="ml-1 text-sm font-medium text-blue-400 md:ml-2 ">Edit Items</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mt-4 bg-indigo-100 rounded-md p-2">
            <h5 class="text-xl ">Edit Items </h5>
        </div>
        {{-- Body Of Item Create --}}
        <form action={{ route('item.update', $item->id) }} method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="md:grid grid-cols-2 gap-4">
                {{-- Item --}}
                <div class="">
                    <h5 class="text-lg my-4">Item Information</h5>

                    {{-- Item Name --}}
                    <div class="mt-4 ">
                        <label for="name" class="block mb-2  font-medium text-gray-600 ">Item Name <span
                                class="text-red-700">*</span></label>
                        @if ($errors->has('name'))
                            <small class="text-red-600">{{ $errors->first('name') }}</small>
                        @endif
                        <input type="text" name="name" id="name" value="{{ $item->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 "
                            placeholder="Input Name">
                    </div>
                    {{-- Item Category Option --}}
                    <div class="mt-4">
                        <label for="category" class="block mb-2  font-medium text-gray-600 ">Select Category <span
                                class="text-red-700">*</span></label>
                        @if ($errors->has('category'))
                            <small class="text-red-600">{{ $errors->first('category') }}</small>
                        @endif
                        <select name="category_id" id="category" placeholder="Select Category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 mt-1 ">

                            @foreach ($categories as $category)
                                <option value={{ $category->id }} @if ($item->category_id == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    {{-- Item Price --}}
                    <div class="mt-4 ">
                        <label for="price" class="block mb-2  font-medium text-gray-600 ">Item Price <span
                                class="text-red-700">*</span></label>
                        @if ($errors->has('price'))
                            <small class="text-red-600">{{ $errors->first('price') }}</small>
                        @endif
                        <input type="number" name="price" id="price" value="{{ $item->price }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 "
                            placeholder="Input Price">
                    </div>
                    {{-- Description --}}
                    <div class="mt-4 ">
                        <label for="description" class="block mb-2  font-medium text-gray-600 ">Item Description <span
                                class="text-red-700">*</span></label>
                        @if ($errors->has('description'))
                            <small class="text-red-600">{{ $errors->first('description') }}</small>
                        @endif
                        <textarea id="description" name="description">{{ $item->description }}</textarea >
                    </div>
                    {{-- Item Condition --}}
                    <div class="mt-4">
                        <label for="condition" class="block mb-2  font-medium text-gray-600 ">Select Item Condition <span
                                class="text-red-700">*</span></label>
                        @if ($errors->has('condition'))
<small class="text-red-600">{{ $errors->first('condition') }}</small>
@endif
                        <select name="condition" id="condition"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 mt-1 ">
                            <option selected>Select Item Condition</option>
                            <option @if ($item->condition == 'New') selected @endif value="New">New</option>
                            <option @if ($item->condition == 'Used') selected @endif value="Used">Used</option>
                            <option @if ($item->condition == 'Good Second Hand') selected @endif value="Good Second Hand">Good Second Hand</option>


                        </select>
                    </div>
                    {{-- Item Type --}}
                    <div class="mt-4">
                        <label for="type" class="block mb-2  font-medium text-gray-600 ">Select Item Type <span
                                class="text-red-700">*</span></label>
                        @if ($errors->has('type'))
<small class="text-red-600">{{ $errors->first('type') }}</small>
@endif
                        <select name="type" id="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 mt-1 ">
                            <option selected>Select Item Type</option>
                            <option @if ($item->type == 'For Sell') selected @endif value="For Sell">For Sell</option>
                            <option @if ($item->type == 'For Buy') selected @endif value="For Buy">For Buy</option>
                            <option @if ($item->type == 'For Exchange') selected @endif value="For Exchange">For Exchange</option>
                        </select>
                    </div>
                    {{-- Publish --}}
                    <div class="mt-4">
                        <label for="status" class="block mb-2  font-medium text-gray-600 ">Status</label>
                        <div class="flex items-center">
                            <input id="status" type="checkbox" name="status" value="publish" @if ($item->status == 'publish') checked @endif
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2">
                            <label for="status" class="ml-2 text-sm text-gray-600 ">Publish</label>
                        </div>
                    </div>
                    {{-- Item Name --}}
                    <div class="mt-4">
                        <label for="photo" class="block mb-2  font-medium text-gray-600 ">Item Photo <span
                                class="text-red-700">*</span></label>
                        <small class="text-gray-400 m">Recomanded Size 400 x 600</small>
                        @if ($errors->has('photo'))
<small class="text-red-600">{{ $errors->first('photo') }}</small>
@endif
                        <input type="file" name="photo" id="photo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 mt-1 "
                            placeholder="Input Photo">
                            <img src="{{ $item->photo_url }}" class="h-32" alt="">
                    </div>
                </div>
                {{-- Owner --}}
                <div class="">
                    <h5 class="text-lg my-4">Owner Information</h5>
                    {{-- Owner Name --}}
                    <div class="mt-4 ">
                        <label for="owner_name" class="block mb-2  font-medium text-gray-600 ">Owner Name <span
                                class="text-red-700">*</span></label>
                        @if ($errors->has('owner_name'))
<small class="text-red-600">{{ $errors->first('owner_name') }}</small>
@endif
                        <input type="text" name="owner_name" id="owner_name" value="{{ $item->owner->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 "
                            placeholder="Owner Name">
                    </div>
                    {{-- Owner Phone --}}
                    <div class="mt-4 ">
                        <label for="owner_phone" class="block mb-2  font-medium text-gray-600 ">Contact Number <span
                                class="text-red-700">*</span></label>
                        @if ($errors->has('owner_phone'))
<small class="text-red-600">{{ $errors->first('owner_phone') }}</small>
@endif

                        <input type="number" name="owner_phone" id="owner_phone" value="{{ $item->owner->phone }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 "
                            placeholder="Add Number">

                    </div>
                    {{-- Owner Address --}}
                    <div class="mt-4 ">
                        <label for="owner_address" class="block mb-2  font-medium text-gray-600 ">Address <span
                                class="text-red-700">*</span></label>
                        @if ($errors->has('owner_address'))
<small class="text-red-600">{{ $errors->first('owner_address') }}</small>
@endif
                        <textarea
                            name="owner_address"class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 "
                            cols="30" rows="5" placeholder="Enter Address">{{ $item->owner->address }}</textarea>
                    </div>
                    <div class="mt-4">
                        <div id="map" class="h-96"></div>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        </{{ $item->latitude }} {{-- Submit Button --}} <div class="mt-4 flex flex-row-reverse">
                        <input type="submit" value="Save"
                            class="p-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 cursor-pointer">
                        <button class=" p-2 rounded-md mx-2 text-indigo-400">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="http://code.jquery.com/jquery.min.js"></script>
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
            .bindPopup('Select Yout Location By Click On Map')
            .openPopup();
        map.on('click', function(e) {
            alert("Your Location is Added With - Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
            document.getElementById('latitude').value = e.latlng.lat
            document.getElementById('longitude').value = e.latlng.lng

        });
    </script>
@endsection
