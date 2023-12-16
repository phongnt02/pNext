
<div class="grid grid-cols-2 m-8">
    @foreach ($config['form'] as $key => $v)
        @switch($v['type'])
            @case('text')
                @include('ListBag::input', ['key' => $key, 'v' => $v, 'data' => $dataForm])
            @break

            @case('file')
                @include('ListBag::file', ['key' => $key, 'v' => $v])
            @break
            @case('datetime')
                @include('ListBag::datetimePicker', ['key' => $key, 'v' => $v , 'data' => $dataForm])
            @break
            @case('select')
                @include('ListBag::select', ['key' => $key, 'v' => $v, 'data' => $dataForm])
            @break

            @default
        @endswitch
    @endforeach
</div>

