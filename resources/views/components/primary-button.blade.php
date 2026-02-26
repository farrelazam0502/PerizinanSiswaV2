<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-10 py-4 bg-white text-black rounded-2xl font-black text-[12px] uppercase tracking-[0.2em] shadow-[0_20px_40px_rgba(255,255,255,0.1)] hover:bg-neutral-200 focus:outline-none transition-all duration-300 active:scale-95']) }}>
    {{ $slot }}
</button>
