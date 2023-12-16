@extends('layouts.app')

@section('content')
    <div class="sm:flex m-4">
        <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
            <form class="lg:pr-3" action="{{ route('courses.index') }}" method="GET">
                <label for="users-search" class="sr-only">Search</label>
                <div class="mt-1 relative lg:w-64 xl:w-96 flex justify-around">
                    <input type="text" name="name_courses" id="users-search"
                        value="{{ isset($listBag->SearchTransform['name_courses']) ?  $listBag->SearchTransform['name_courses'] : old('name_courses')}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 mr-2"
                        placeholder="Search for courses">
                    <button type="submit" class="w-1/2 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                        Search
                    </button>
                </div>
            </form>
            <div class="flex space-x-1 pl-0 sm:pl-2 mt-3 sm:mt-0">
                <a href="#"
                    class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
            <a type="button" 
                href="{{ route('courses.add') }}"
                class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                Create courses
            </a>
            <button class="w-1/2 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                Export
            </button>
        </div>
    </div>
    <x-ResultSearch :listBag="$listBag" :routeNext="'chapters'"/>
@endsection
