
<div class="grid grid-cols-2 m-8">
    @foreach ($config['form'] as $key => $v)
        @switch($v['type'])
            @case('text')
                @include('ListBag::input', ['key' => $key, 'v' => $v])
            @break

            @case('file')
                @include('ListBag::file', ['key' => $key, 'v' => $v])
            @break

            @default
        @endswitch
    @endforeach
</div>

<div class="w-full px-12 py-6 border-t border-gray-200 rounded-b">
    <button
        class="w-64 text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
        type="submit">
        Submit
    </button>
</div>
