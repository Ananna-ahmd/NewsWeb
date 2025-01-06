<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="sidebar w-64 bg-yellow-500 text-black h-screen p-4">
    <a class="block py-2 px-4 rounded-lg text-lg font-semibold hover:bg-blue-700 active:bg-blue-800" href="">
        Homepage
    </a>
    <a class="block py-2 px-4 rounded-lg text-lg font-semibold hover:bg-blue-700 active:bg-blue-800" href="{{route('articles.create')}}">
         Create News
    </a>
    <a class="block py-2 px-4 rounded-lg text-lg font-semibold hover:bg-blue-700 active:bg-blue-800" href="{{route('categories.create')}}">
        Create Category
    </a>
    <a class="block py-2 px-4 rounded-lg text-lg font-semibold hover:bg-blue-700 active:bg-blue-800" href="#about">
        Update
    </a>
</div>

            </div>
        </div>
    </div>
</x-app-layout>
