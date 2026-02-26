<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-10 py-4 bg-white/5 border border-white/10 rounded-2xl font-black text-[12px] text-gray-400 uppercase tracking-[0.2em] shadow-sm hover:bg-white/10 hover:text-white focus:outline-none transition-all duration-300 active:scale-95 disabled:opacity-25']) }}>
    {{ $slot }}
</button>
