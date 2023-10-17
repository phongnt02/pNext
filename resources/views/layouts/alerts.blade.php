@if (session('info'))
    <div class="rounded-lg m-4">
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">{{ session('info') }}</span>
        </div>
    </div>
@endif

@if (session('danger'))
    <div class="rounded-lg m-4">
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{ session('danger') }}</span>
        </div>
    </div>
@endif

@if (session('success'))
    <div class="rounded-lg m-4">
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    </div>
@endif

@if (session('warning'))
    <div class="rounded-lg m-4">
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
          <span class="font-medium">{{ session('warning') }}</span>
        </div>
    </div>
@endif

@if (session('dark'))
    <div class="rounded-lg m-4">
        <div class="p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
            <span class="font-medium">{{ session('dark') }}</span>
        </div>
    </div>
@endif