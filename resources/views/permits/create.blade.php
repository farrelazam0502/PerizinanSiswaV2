<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('student.permits.index') }}" class="w-8 h-8 rounded border border-[#333] bg-[#1a1a1a] flex items-center justify-center text-gray-400 hover:text-white hover:bg-[#222] transition-colors flex-shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h2 class="font-semibold text-lg text-white tracking-tight leading-none">
                    {{ __('New Application') }}
                </h2>
                <span class="text-[11px] text-gray-500 font-medium tracking-widest mt-1 uppercase">Permit Documentation</span>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0a0a0a] rounded-xl shadow-sm border border-[#222] p-6 sm:p-10 relative overflow-hidden">
                
                <div class="mb-10 pb-6 border-b border-[#222] flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg border border-[#333] bg-[#111] flex items-center justify-center text-white shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-white tracking-tight">Submit New Request</h3>
                        <p class="text-[13px] text-gray-500 mt-1 leading-relaxed">Provide accurate and honest information. Incomplete or false details may result in the rejection of your application.</p>
                    </div>
                </div>

                <!-- Formulir Professional Spatial -->
                <form action="{{ route('student.permits.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Tipe Izin -->
                    <div class="space-y-2.5">
                        <label for="type" class="block text-[12px] font-semibold text-gray-400 uppercase tracking-widest">Type of Request</label>
                        <div class="relative">
                            <select name="type" id="type" required class="appearance-none block w-full bg-[#111] border border-[#333] text-white rounded-md py-2.5 px-3.5 focus:ring-1 focus:ring-white/20 focus:border-white/20 transition-all text-sm font-medium">
                                <option value="" class="bg-[#0a0a0a] text-gray-500">Select option...</option>
                                <option value="Sakit" class="bg-[#0a0a0a] text-white">Sick Leave (Medical Certificate Required if > 2 days)</option>
                                <option value="Dispensasi" class="bg-[#0a0a0a] text-white">Dispensation / Family Matter</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                        @error('type') <span class="text-[11px] font-semibold text-red-500 mt-1.5 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Rentang Tanggal -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pt-2">
                        <div class="space-y-2.5">
                            <label for="start_date" class="block text-[12px] font-semibold text-gray-400 uppercase tracking-widest">Start Date</label>
                            <input type="date" name="start_date" id="start_date" required class="block w-full bg-[#111] border border-[#333] text-white rounded-md py-2.5 px-3.5 focus:ring-1 focus:ring-white/20 focus:border-white/20 transition-all text-sm [color-scheme:dark]">
                            @error('start_date') <span class="text-[11px] font-semibold text-red-500 mt-1.5 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2.5">
                            <label for="end_date" class="block text-[12px] font-semibold text-gray-400 uppercase tracking-widest">End Date</label>
                            <input type="date" name="end_date" id="end_date" required class="block w-full bg-[#111] border border-[#333] text-white rounded-md py-2.5 px-3.5 focus:ring-1 focus:ring-white/20 focus:border-white/20 transition-all text-sm [color-scheme:dark]">
                            @error('end_date') <span class="text-[11px] font-semibold text-red-500 mt-1.5 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Alasan -->
                    <div class="space-y-2.5 pt-2">
                        <label for="reason" class="block text-[12px] font-semibold text-gray-400 uppercase tracking-widest">Detailed Reason</label>
                        <textarea name="reason" id="reason" rows="4" required placeholder="Explain the context and reason for your permit clearly..." class="block w-full bg-[#111] border border-[#333] text-white placeholder-gray-600 rounded-md py-3 px-3.5 focus:ring-1 focus:ring-white/20 focus:border-white/20 transition-all text-sm resize-none"></textarea>
                        @error('reason') <span class="text-[11px] font-semibold text-red-500 mt-1.5 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="pt-6 mt-4 border-t border-[#222] flex items-center justify-between">
                        <a href="{{ route('student.permits.index') }}" class="text-[13px] font-medium text-gray-500 hover:text-white transition-colors">Cancel</a>
                        
                        <button type="submit" class="px-5 py-2.5 bg-white text-black hover:bg-gray-200 rounded-md transition-colors font-medium text-sm border border-transparent flex items-center gap-2 focus:ring-2 focus:ring-white/20 focus:outline-none">
                            <span>Submit Application</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
