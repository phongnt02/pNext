<div class="m-4">
    <label for="{{ $key }}" class="text-sm font-bold text-gray-900 block mb-2">{{ $v['label'] }}</label>
    <input type="{{ $v['type'] }}" name="{{ $key }}" id="{{ $key }}"
    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
    @if ($v['type'] === 'text') maxlength="{{ $v['maxlength'] }}" placeholder="{{ $v['placeholder'] }}" @endif />
</div>