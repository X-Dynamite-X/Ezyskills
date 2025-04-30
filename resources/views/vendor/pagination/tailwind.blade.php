@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination-wrapper">
        <div class="flex items-center justify-between">
            <div class="flex flex-1 justify-between sm:hidden">
                {{-- Mobile Previous/Next --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex cursor-default select-none items-center opacity-50">
                        <span class="px-4 py-2">{{ __('Previous') }}</span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="hover:scale-105">
                        <span class="px-4 py-2">{{ __('Previous') }}</span>
                    </a>
                @endif

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="hover:scale-105">
                        <span class="px-4 py-2">{{ __('Next') }}</span>
                    </a>
                @else
                    <span class="relative inline-flex cursor-default select-none items-center opacity-50">
                        <span class="px-4 py-2">{{ __('Next') }}</span>
                    </span>
                @endif
            </div>

            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-center">
                <div>
                    <span class="flex items-center gap-2">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <span class="flex h-10 w-10 cursor-not-allowed items-center justify-center rounded-md border border-gray-300 bg-[#F98149] opacity-50">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </span>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" class="flex h-10 w-10 items-center justify-center rounded-md border border-gray-300 bg-[#F98149] transition-all duration-300 hover:opacity-80">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span class="flex h-10 w-10 items-center justify-center rounded-md text-sm font-medium text-gray-700">
                                    {{ $element }}
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <span class="flex h-10 w-10 items-center justify-center rounded-md bg-[#F98149] text-sm font-medium text-white transition-all duration-300">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}" class="flex h-10 w-10 items-center justify-center rounded-md border border-gray-300 bg-white text-sm font-medium text-gray-700 transition-all duration-300 hover:bg-gray-50">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" class="flex h-10 w-10 items-center justify-center rounded-md border border-gray-300 bg-[#F98149] transition-all duration-300 hover:opacity-80">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @else
                            <span class="flex h-10 w-10 cursor-not-allowed items-center justify-center rounded-md border border-gray-300 bg-[#F98149] opacity-50">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </nav>
@endif


