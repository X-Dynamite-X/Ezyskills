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
                    <span class="flex items-center gap-1">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <span class="flex h-9 w-9 cursor-not-allowed items-center justify-center rounded-full border border-gray-200 bg-white opacity-50 dark:border-gray-700 dark:bg-gray-800">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </span>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" class="flex h-9 w-9 items-center justify-center rounded-full border border-gray-200 bg-white transition-all duration-300 hover:scale-110 hover:border-blue-600 hover:bg-blue-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:border-blue-500 dark:hover:bg-gray-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span class="flex h-9 w-9 items-center justify-center rounded-full text-sm font-medium">
                                    {{ $element }}
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-600 text-sm font-medium text-white transition-all duration-300 hover:bg-blue-700">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}" class="flex h-9 w-9 items-center justify-center rounded-full text-sm font-medium text-gray-700 transition-all duration-300 hover:scale-110 hover:bg-gray-100 hover:text-blue-600 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-blue-400">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" class="flex h-9 w-9 items-center justify-center rounded-full border border-gray-200 bg-white transition-all duration-300 hover:scale-110 hover:border-blue-600 hover:bg-blue-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:border-blue-500 dark:hover:bg-gray-700">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @else
                            <span class="flex h-9 w-9 cursor-not-allowed items-center justify-center rounded-full border border-gray-200 bg-white opacity-50 dark:border-gray-700 dark:bg-gray-800">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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