@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-10 border-b border-gray-200">
            <h1 class="text-6xl text-gray-600">
                Blog Posts
            </h1>
        </div>
    </div>

    @if (session()->has('message'))
        {{-- <div class="w-4/5 pl-2 m-auto mt-10">
            <p class="w-2/6 py-4 mb-4 bg-green-500 text-gray-50 rounded-2xl">
                {{ session()->get('message') }}
            </p>
        </div> --}}
        <div class="w-4/5 p-10 m-auto">
            <div class="relative block w-full p-4 text-base leading-5 text-white bg-red-500 rounded-lg opacity-100 font-regular"
                data-dismissible="alert">
                <div class="mr-12">
                    {{ session()->get('message') }}
                </div>
                <div class="absolute top-2.5 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20"
                    data-dismissible-target="alert">
                    <button role="button" class="p-1 rounded-lg w-max">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif
    @if (Auth::check())
        <div class="w-4/5 pt-10 m-auto">
            <a href="/blog/create" class="px-5 py-3 text-xs font-extrabold text-gray-100 uppercase bg-gray-400 hover:bg-gray-700 rounded-3xl">
                Create Post
            </a>
        </div>
    @endif

    @foreach ($posts as $post)
        <div class="w-4/5 grid-cols-2 gap-20 py-10 mx-auto border-b border-gray-200 sm:grid">
            <div>
                <img src="{{ asset('images/' . $post->path_image) }}" width="700" alt="">
            </div>
            <div>
                <h2 class="pb-4 text-5xl font-bold text-gray-700">
                    {{ $post->title }}
                </h2>
                <span class="text-gray-500">
                    By <span class="italic font-bold text-gray-800">{{ $post->user->name }}</span>, Created On
                    {{ date('jS M Y', strtotime($post->updated_at)) }}
                </span>
                <p class="pt-8 pb-10 text-xl font-light leading-8 text-gray-700">
                    {{ $post->description }}
                </p>
                <a href="/blog/{{ $post->slug }}"
                    class="px-8 py-4 text-lg font-extrabold text-gray-100 uppercase bg-gray-400 rounded-3xl hover:bg-gray-700">
                    Keep reading
                </a>

                {{-- The user with the same id as the user_id in the posts can edit a post --}}
                @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                    {{-- We will se if the user is logged in and also if the logged in user is the creator of the post --}}
                    <span class="float-right ">
                        <a href="/blog/{{ $post->slug }}/edit"
                            class="pb-1 italic text-orange-500 hover:text-orange-900">Edit</a>
                    </span>
                    <span class="float-right">
                        <form action="/blog/{{ $post->slug }}/destroy" method="">
                            @csrf
                            @method('Delete')
                            <button class="pr-4 italic text-red-500 hover:text-red-900" type="submit">
                                Delete
                            </button>
                        </form>
                    </span>
                @endif

            </div>
        </div>
    @endforeach
@endsection
