@extends('layouts.app')
@section('content')
    <form method="POST" enctype="multipart/form-data" action={{ $mode == 'create' ? route('chapters.storage', ['courses_id' => $courses_id]) : route('chapters.update', ['chapters_id' => $data['chapters_id']]) }}
        class="bg-white shadow rounded-lg m-4">
        @csrf
        <x-BuildForm :listField="'chapters'" :data="$data"/>

        <div class="w-full px-12 py-6 border-t border-gray-200 rounded-b">
            <button
                class="w-64 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="submit">
                Submit
            </button>
            <a href="{{ route('chapters.index', ['courses_id' => $courses_id ?? $data['courses_id'], 'name_chapters' => old('name_chapters')]) }}"
                class="w-64 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                Back
            </a>
        </div>
    </form>
@endsection
