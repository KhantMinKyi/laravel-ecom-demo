@extends('layout.master')
@section('content')
    <div class="flex flex-col items-center justify-center mx-auto px-4 py-6 ">
        <div class="mx-auto bg-white rounded-lg shadow px-6 py-4 w-full md:w-1/3">
            <h1 class="font-Raleway text-xl">Sing In Admin Account</h1>
            <hr class="my-6 ">
            <form class="space-y-4" action={{ route('admin.login') }} method="POST">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-600 ">Enter Your
                        email</label>
                    @if ($errors->has('email'))
                        <small class="text-red-600">{{ $errors->first('email') }}</small>
                    @endif
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  focus:outline-none  block w-full p-2.5 "
                        placeholder="name@gmail.com">
                </div>
                <hr class="my-6 w-1/2 mx-auto">
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-600 ">Enter Your
                        password</label>
                    @if ($errors->has('password'))
                        <small class="text-red-600">{{ $errors->first('password') }}</small>
                    @endif
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:outline-none  block w-full p-2.5 "
                        placeholder="*********">
                </div>
                <button type="submit"
                    class=" bg-indigo-500 p-2 rounded-lg font-RalewayThin text-white w-full focus:outline-none hover:bg-indigo-600 shadow hover:shadow-xl">Log
                    In</button>
                <p class="text-sm font-light text-gray-500 ">
                    Don’t have an account yet? <a href="#" class="font-medium text-indigo-600 hover:underline ">Sign
                        up</a>
                </p>
            </form>
        </div>
    </div>
@endsection
