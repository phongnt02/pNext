{{-- @php
    dump($listBag);
@endphp --}}

<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden">
                <table class="table-fixed min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    @if ($routeNext) 

                                    @else
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    @endif
                                </div>
                            </th>
                            @foreach ($listBag->config as $key => $value)
                                @if ($value['show'])
                                    <th scope="col" nameColumn="{{ $key }}"
                                        class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                        {{ $value['label'] }}
                                    </th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($dataTable as $index => $value)
                            <tr class="hover:bg-gray-100">
                                <td class="p-4 w-4">
                                    @if ($routeNext)    
                                        <a href="{{route($routeNext . '.index', $listId[$index][$routeNext])}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                                        </a>
                                    @else
                                        <div class="flex items-center">
                                            <input id="checkbox-194556" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                            <label for="checkbox-194556" class="sr-only">checkbox</label>
                                        </div>
                                    @endif
                                </td>
                                @foreach ($value as $item)
                                    <td class="p-4 text-base font-medium text-gray-800">
                                        <span class="line-clamp-5 w-44 overflow-hidden overflow-ellipsis">
                                            @if ($item instanceof Closure)
                                                {!! $item($listId[$index][$routeNext], $index) !!}
                                            @else
                                                {{ $item }}
                                            @endif
                                        </span>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4">
    <div class="flex items-center mb-4 sm:mb-0">
        <a href="#"
            class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </a>
        <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </a>
        <span span class="text-sm font-normal text-gray-500">
            Showing 
            <span class="text-gray-900 font-semibold">1-20</span> 
            of 
            <span class="text-gray-900 font-semibold">2290</span>
        </span>
    </div>
    <div class="flex items-center space-x-3">
        <a href="#"
            class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
            Previous
        </a>
        <a href="#"
            class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
            Next
        </a>
    </div>
</div>
