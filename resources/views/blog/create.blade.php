@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-10 border-b">
            <h1 class="text-6xl text-gray-600">
                Create Posts
            </h1>
        </div>
    </div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
    <ul>
        @foreach ($errors->all() as $error)
             <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                {{ $error }}
            </li>
        @endforeach
    </ul>
    </div>
@endif

    <div class="w-4/5 m-auto pt-20">
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text"
                    name="title"
                    placeholder="Title..."
                    class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

            <textarea name="description"
                        placeholder="Description..."
                        class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">
            </textarea>

            <div class="bg-gray-lighter pt-15">
                <label for="" class="w-4/5 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-2 text-base leading-normal">
                        Select a file
                    </span>
                    <input type="file" name="image">
                </label>
            </div>
            <button class="uppercase mt-8 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl" type="submit">
                Submit Post
            </button>
        </form>
    </div>
@endsection
