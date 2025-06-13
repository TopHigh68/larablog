<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Message flash -->
    @if (session('success'))
    <div class="bg-green-500 text-white p-4 w-[60%] mx-auto rounded-lg mt-6 mb-6 text-center">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="bg-red-500 text-white p-4 w-[60%] mx-auto rounded-lg mt-6 mb-6 text-center">
        {{ session('error') }}
    </div>
    @endif

    <!-- Articles -->
    @foreach ($articles as $article)
    <div class="bg-white  dark:bg-slate-500 flex w-[60%] mx-auto overflow-hidden shadow-sm sm:rounded-lg mt-4">
        <div class="p-6 w-[90%] text-gray-900">
            <h2 class="text-2xl dark:text-white font-bold">{{ $article->title }}</h2>
            <p class="text-gray-700 dark:text-white">{{ substr($article->content, 0, 30) }}...</p>
        </div>
        <div class="text-right flex items-center w-[5%] justify-center cursor-pointer bg-[#1b5994]">
            <a href="{{ route('articles.edit', $article->id) }}" class="text-red-500  hover:text-red-700"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#fff"
                        d="m21.561 5.318l-2.879-2.879A1.5 1.5 0 0 0 17.621 2c-.385 0-.768.146-1.061.439L13 6H4a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h13a1 1 0 0 0 1-1v-9l3.561-3.561c.293-.293.439-.677.439-1.061s-.146-.767-.439-1.06M11.5 14.672L9.328 12.5l6.293-6.293l2.172 2.172zm-2.561-1.339l1.756 1.728L9 15zM16 19H5V8h6l-3.18 3.18c-.293.293-.478.812-.629 1.289c-.16.5-.191 1.056-.191 1.47V17h3.061c.414 0 1.108-.1 1.571-.29c.464-.19.896-.347 1.188-.64L16 13zm2.5-11.328L16.328 5.5l1.293-1.293l2.171 2.172z" />
                </svg></a>
        </div>
        <div class="text-right flex items-center w-[5%] justify-center cursor-pointer bg-[#b82424]">
            <a href="{{ route('articles.remove', $article->id) }}" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#fff" fill-rule="evenodd"
                        d="M9.774 5L3.758 3.94l.174-.986a.5.5 0 0 1 .58-.405L18.411 5h.088h-.087l1.855.327a.5.5 0 0 1 .406.58l-.174.984l-2.09-.368l-.8 13.594A2 2 0 0 1 15.615 22H8.386a2 2 0 0 1-1.997-1.883L5.59 6.5h12.69zH5.5zM9 9l.5 9H11l-.4-9zm4.5 0l-.5 9h1.5l.5-9zm-2.646-7.871l3.94.694a.5.5 0 0 1 .405.58l-.174.984l-4.924-.868l.174-.985a.5.5 0 0 1 .58-.405z" />
                </svg></a>
        </div>
    </div>
    @endforeach

</x-app-layout>