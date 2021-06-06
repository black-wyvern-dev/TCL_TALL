<div wire:poll class="flow-root mt-6">
    <ul class="-my-5 divide-y divide-gray-200">
        @forelse ($fleets as $fleet)
            @if ($loop->index === 5)
                @break
            @endif
            <li class="py-4">
                <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <span class="inline-block h-6 w-6 rounded-full overflow-hidden bg-gray-100">
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        </span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">

                    {{$fleet->hirer_name}}
                    </p>
                    <p class="text-sm text-gray-500 truncate">
                        {{$fleet->company->company}}
                    <!-- Tanker Man Limited -->
                    </p>
                </div>
                <div>
                    <a href="/hires/{{$fleet->id}}/edit" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                    View
                    </a>
                </div>
                </div>
            </li>
        @empty
            <li class="py-4 hover:bg-gray-50">
                No pending hires.
            </li>
        @endforelse
    </ul>
</div>