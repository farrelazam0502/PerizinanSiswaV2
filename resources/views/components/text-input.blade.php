@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-white/[0.03] border-white/10 focus:border-white/20 focus:ring-4 focus:ring-white/[0.02] rounded-2xl shadow-sm text-white placeholder-gray-600 font-bold py-3.5 px-6 transition-all duration-300']) }}>
