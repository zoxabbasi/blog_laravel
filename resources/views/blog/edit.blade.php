@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-10 border-b">
            <h1 class="text-6xl text-gray-600">
                Update Post
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 py-4 mb-4 bg-red-700 text-gray-50 rounded-2xl">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-4/5 pt-20 m-auto">
        <form action="/blog/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="title" value="{{ $post->title }}"
                class="block w-full h-20 text-6xl bg-transparent border-b-2 outline-none">

            <textarea name="description" class="block w-full py-20 text-xl bg-transparent border-b-2 outline-none h-60">
                        {{ $post->description }}
            </textarea>
            <button class="px-8 py-4 mt-8 text-lg font-extrabold text-gray-100 uppercase bg-gray-400 hover:bg-gray-700 rounded-3xl"
                type="submit">
                Update Post
            </button>
        </form>
    </div>
@endsection
