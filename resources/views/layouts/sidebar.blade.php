@php
    $sidebarItem = [
        'main' => [
            [
                'title' => 'Dashboard',
                'url' => route('dashboard.index'),
            ],
            [
                'title' => 'User',
                'url' => route('user.index'),
            ],
            [
                'title' => 'Courses',
                'url' => route('courses.index', ['courses' => old('courses'), 'chapters' => old('chapters'), 'lessons' => old('lessons')]),
            ],
        ],
        'helps' => [
            [
                'title' => 'Settings',
                'url' => '',
            ],
            [
                'title' => 'Helps',
                'url' => '',
            ],
            [
                'title' => 'Logout',
                'url' => '',
            ],
        ],
    ];
@endphp


<aside id="sidebar"
    class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
    aria-label="Sidebar">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white divide-y space-y-1">
                <ul class="space-y-2 pb-2">
                    @foreach ($sidebarItem['main'] as $item)
                        @if (isset($item['children']))
                            <li>
                                <button type="button"
                                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">
                                        {{ $item['title'] }}
                                    </span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" /></svg>
                                </button>
                                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                    @foreach ($item['children'] as $children)                                        
                                        <li>
                                            <a href="{{ $children['url'] }}"
                                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ $children['title']}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{ $item['url'] }}"
                                    class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                                    <i class="fa-solid fa-check"></i>
                                    <span class="ml-3">{{ $item['title'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="space-y-2 pt-2">
                    @foreach ($sidebarItem['helps'] as $item)
                        <a href="{{ $item['url'] }}"
                            class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                            <i class="fa-solid fa-check"></i>
                            <span class="ml-4">{{ $item['title'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</aside>
