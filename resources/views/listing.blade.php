@extends('layout')

@section('content')
    @include('partials._search')

    <a href="index.html" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{asset('images/no-image.png')}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing->manufacturer}}</div>
                <ul class="flex">
                    <li
                        class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                    >
                        <a href="#">Laravel</a>
                    </li>
                    <li
                        class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                    >
                        <a href="#">API</a>
                    </li>
                    <li
                        class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                    >
                        <a href="#">Backend</a>
                    </li>
                    <li
                        class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                    >
                        <a href="#">Vue</a>
                    </li>
                </ul>
                <div class="border border-gray-200 w-full m-4"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Item Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$listing->description}}

                        <a
                            href="mailto:{{$listing->email}}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                            Contact Seller</a
                        >

                    </div>
                </div>
            </div>
        </x-card>
    </div>
@endsection
