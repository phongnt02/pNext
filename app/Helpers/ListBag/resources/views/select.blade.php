@php
    if (old($key)) {
        $v['selected'] = old($key);
    }
    else if(isset($data[$key])) {
        $v['selected'] = $data[$key];
    }
@endphp

<div class="m-4">
    <label for="{{ $key }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $v['label'] }}</label>
    <select id="{{ $key }}"
        name="{{ $key }}" value="{{ isset($data[$key]) ? $data[$key] : old($key) }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($v['options'] as $option => $value)
            @if ($value == $v['selected'])
                <option selected value="{{ $option }}">{{ $value }}</option>
            @else
                <option value="{{ $option }}">{{ $value }}</option>
            @endif
        @endforeach
    </select>
</div>
