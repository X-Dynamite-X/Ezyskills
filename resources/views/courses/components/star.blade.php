@props(['type' => 'empty'])

@php
    $colors = [
        'full' => 'text-yellow-400',
        'half' => 'text-yellow-400',
        'empty' => 'text-gray-300',
    ];
@endphp

<svg class="w-4 h-4 {{ $colors[$type] }}" fill="currentColor" viewBox="0 0 20 20"
     xmlns="http://www.w3.org/2000/svg">
    @if($type === 'half')
        <defs>
            <linearGradient id="half-star">
                <stop offset="50%" stop-color="currentColor" />
                <stop offset="50%" stop-color="#D1D5DB" />
            </linearGradient>
        </defs>
        <path fill="url(#half-star)" d="M9.049 2.927c..."></path>
    @else
        <path d="M9.049 2.927c..."></path>
    @endif
</svg>
