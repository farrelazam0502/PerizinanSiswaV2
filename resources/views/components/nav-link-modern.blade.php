@props(['active'])

@php
$classes = ($active ?? false)
            ? 'relative text-white font-bold text-[14px] px-2 py-1 flex items-center gap-2 group transition-all duration-300'
            : 'relative text-gray-500 hover:text-white font-bold text-[14px] px-2 py-1 flex items-center gap-2 group transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="relative z-10">{{ $slot }}</span>
    
    <!-- Animated Indicator -->
    @if($active ?? false)
        <div class="absolute -bottom-1.5 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-white/40 to-transparent"></div>
        <div class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-1 h-1 rounded-full bg-white shadow-[0_0_10px_#fff]"></div>
    @endif

    <!-- Hover Indicator -->
    <div class="absolute -inset-x-2 -inset-y-1 rounded-lg bg-white/0 group-hover:bg-white/5 transition-colors duration-300"></div>
</a>
