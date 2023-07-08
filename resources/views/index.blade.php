@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 m-auto background-image">
        <div class="flex pt-10 text-gray-100">
            <div class="block w-4/5 pt-4 pb-16 m-auto text-center sm:m-auto">
                <h1 class="text-5xl font-bold uppercase sm:text-white text-shadow-md pb-14">
                    Do you want to become a developer?
                </h1>
                <a href="/blog" class="px-4 py-2 text-xl font-bold text-center text-gray-700 uppercase bg-gray-50">
                    Read More
                </a>
            </div>
        </div>
    </div>
    <div class="w-4/5 grid-cols-2 gap-20 py-20 mx-auto border-b border-gray-200 sm:grid">
        <div>
            <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849822_1280.jpg" width="700" alt="">
        </div>
        <div class="block w-4/5 m-auto text-left sm:m-auto">
            <h2 class="text-3xl font-extrabold text-gray-600">
                Struggling to be a better web developer
            </h2>
            <p class="py-8 text-gray-500 text-l">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            </p>
            <p class="font-extrabold text-gray-600 text-s pb-9">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti ea adipisci minus, nemo velit, tenetur
                deserunt quod tempore eos provident, sequi architecto exercitationem.
            </p>
            <a href="/blog" class="px-8 py-3 font-extrabold text-gray-100 uppercase bg-gray-400 hover:bg-gray-700 text-s rounded-3xl">
                Find out more
            </a>
        </div>
    </div>
    <div class="p-10 text-center text-white bg-gray-800">
        <h2 class="pb-5 text-2xl text-l">
            I'm expert in...
        </h2>
        <span class="block py-3 text-4xl font-extrabold">UX Design</span>
        <span class="block py-3 text-4xl font-extrabold">Project Management</span>
        <span class="block py-3 text-4xl font-extrabold">Digital Strategy</span>
        <span class="block py-3 text-4xl font-extrabold">Backend Development</span>
    </div>

    <div class="py-10 text-center">
        <span class="text-gray-400 uppercase text-s">
            Blog
        </span>
        <h2 class="py-10 text-4xl font-bold text-gray-600">
            Recent Posts
        </h2>
        <p class="w-4/5 m-auto text-gray-500">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla repellendus ea modi rerum asperiores nemo dolorum
            id, dolore, reiciendis exercitationem inventore numquam vitae molestiae aperiam ducimus nesciunt dolorem quaerat
            officia.
        </p>

    </div>

    <div class="w-4/5 grid-cols-2 m-auto sm:grid">
        <div class="flex pt-10 text-gray-100 bg-yellow-700">
            <div class="block w-4/5 pt-4 pb-6 m-auto sm:m-auto">
                <span class="text-xs uppercase">
                    PHP
                </span>
                <h3 class="py-10 text-xl font-bold">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus commodi illum vero similique quis.
                    Corporis hic, labore placeat magni et vero facere repellat! Nihil doloremque cum illo quo, et fugit.
                </h3>
                <a href=""
                    class="px-5 py-3 text-xs font-extrabold text-gray-100 uppercase bg-transparent border-2 border-gray-100 rounded-3xl">
                    Find out more
                </a>
            </div>
        </div>
        <div>
            <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849822_1280.jpg" width="700" alt="">
        </div>
    </div>
@endsection
