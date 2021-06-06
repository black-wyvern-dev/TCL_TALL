<div wire:poll class="flow-root mt-6">
    <ul class="-my-5 divide-y divide-gray-200">

        @forelse($fleets as $fleet)
            @if ($loop->index === 5)
                @break
            @endif
            <li class="py-4 hover:bg-gray-50" 
                style="
                    background-color : {{$fleet->status === 'pending' ? 'rgba(220, 38, 38, 0.2)' : ''}};
                    border-radius : {{$fleet->status === 'pending' ? '15px' : '0px'}};
                "
            >
                <div class="flex items-center space-x-4 px-2 mr">
                    <div class="flex-shrink-0 {{$fleet->status === 'onHire' ? 'text-red-600' : 'text-green-600' }} h-8 w-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path fill="#fff" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">
                        {{$fleet->company->company}}
                        <!-- Milk Flow Limited -->
                    </p>
                    <p class="mt-2 text-sm text-gray-500 truncate">
                        {{$fleet->start_date->format("jS M")}}
                        <!-- 21st Feb -->
                        <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{$fleet->status === 'onHire' ? 'bg-red-100 text-red-600' : ' bg-green-100 text-green-600' }}">
                            <!-- FN07844 -->
                            {{$fleet->order_num}}
                        </span>
                    </p>
                    </div>
                    <div>
                    <!-- <a href="{{'hires/'.$fleet->id.'/edit'}}" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"> -->
                    
                    <a href="{{route('hires.edit', [$fleet])}}" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                        View
                    </a>
                    </div>
                </div>
            </li>
        @empty
            <li class="py-4 hover:bg-gray-50">
                There is no pending hires on this week.
            </li>
        @endforelse

        <!-- <li class="py-4 hover:bg-gray-50">
        <div class="flex items-center space-x-4 px-2">
            <div class="flex-shrink-0 text-red-600 h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill="#fff" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900 truncate">
                Oil Be Back Inc.
            </p>
            <p class="text-sm text-gray-500 truncate">
                22nd Feb
                <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-600">
                    FN07311
                </span>
            </p>
            </div>
            <div>
            <a href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                View
            </a>
            </div>
        </div>
        </li>

        <li class="py-4 hover:bg-gray-50">
        <div class="flex items-center space-x-4 px-2">
            <div class="flex-shrink-0 text-green-600 h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill="#fff" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900 truncate">
                Eflowent Systems
            </p>
            <p class="text-sm text-gray-500 truncate">
                23rd Feb
                <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-600">
                    FN07807
                </span>
            </p>
            </div>
            <div>
            <a href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                View
            </a>
            </div>
        </div>
        </li>

        <li class="py-4 hover:bg-gray-50">
        <div class="flex items-center space-x-4 px-2">
            <div class="flex-shrink-0 text-green-600 h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill="#fff" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900 truncate">
                Water Works LTD
            </p>
            <p class="text-sm text-gray-500 truncate">
                25th Feb
                <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-600">
                    FN06353
                </span>
            </p>
            </div>
            <div>
            <a href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                View
            </a>
            </div>
        </div>
        </li> -->
    </ul>
</div>
