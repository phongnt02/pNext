@extends('layouts.app')

@section('content')
    <form method="POST" enctype="multipart/form-data"
    action={{ route('courses.storage') }}
    class="bg-white shadow rounded-lg m-4">
        @csrf
        <x-BuildForm :listField="'courses'" />
    </form>
@endsection
