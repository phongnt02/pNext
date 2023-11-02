<div class="m-4">
    <label for="{{ $key }}" class="text-sm font-bold text-gray-900 block mb-2">{{ $v['label'] }}</label>
    <label class="w-52 flex flex-col items-center px-2 py-4 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-400 hover:text-white text-blue-400 ease-linear transition-all duration-150">
        <i class="fas fa-cloud-upload-alt fa-3x"></i>
        <span class="mt-2 text-base leading-normal">Tải lên tài liệu</span>
        <input type='file' class="hidden" name="{{ $key }}" id="{{ $key }}" />
    </label>
</div>
