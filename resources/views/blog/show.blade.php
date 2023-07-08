@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-10 border-b">
            <h1 class="text-6xl text-gray-600">
                {{ $post->title }}
            </h1>
        </div>

        <div>
            <span class="text-gray-500">
                By <span class="italic font-bold text-gray-800">
                    {{ $post->user->name }}
                </span>, Created On
                {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>
            <p class="pt-8 pb-10 text-xl font-light leading-8 text-gray-700">
                {{ $post->description }}
            </p>
        </div>
    </div>
@endsection
