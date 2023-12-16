<div class="m-4">
    <label for="{{ $key }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $v['label'] }}</label>
    <input type="{{ $v['type'] }}" name="{{ $key }}" id="{{ $key }}" value="{{ isset($data[$key]) ? $data[$key] : old($key) }}"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    @if ($v['type'] === 'text') 
    maxlength="{{ isset($v['maxlength']) ? $v['maxlength'] : '' }}" 
    placeholder="{{ isset($v['placeholder']) ? $v['placeholder'] : '' }}" 
    {{ $v['require'] ? 'required' : false }}
    @endif 
    />
</div>