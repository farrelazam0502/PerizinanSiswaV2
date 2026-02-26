<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-10 py-4 bg-rose-500/10 border border-rose-500/20 text-rose-500 rounded-2xl font-black text-[12px] uppercase tracking-[0.2em] shadow-[0_20px_40px_rgba(244,63,94,0.05)] hover:bg-rose-500 hover:text-white focus:outline-none transition-all duration-300 active:scale-95']) }}>
    {{ $slot }}
</button>
