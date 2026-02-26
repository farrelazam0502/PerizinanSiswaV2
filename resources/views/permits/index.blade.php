<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded border border-[#333] bg-[#1a1a1a] flex items-center justify-center text-white shadow-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h2 class="font-semibold text-lg text-white tracking-tight leading-none">
                        {{ __('Student Overview') }}
                    </h2>
                    <span class="text-[11px] text-gray-500 font-medium tracking-widest mt-1 uppercase">Permit History</span>
                </div>
            </div>
            
            <a href="{{ route('student.permits.create') }}" class="group relative px-5 py-2 bg-white text-black hover:bg-gray-100 rounded-md transition-all font-medium text-sm tracking-wide border border-transparent shadow-sm flex items-center gap-2 focus:ring-2 focus:ring-white/20">
                <span class="relative z-10 flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Submit Request</span>
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="p-3 mb-8 rounded-md bg-emerald-500/10 border border-emerald-500/20 flex items-center gap-3">
                    <div class="text-emerald-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <p class="text-white font-medium text-[13px]">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-[#0a0a0a] rounded-xl overflow-hidden shadow-sm border border-[#222]">
                
                <div class="p-5 border-b border-[#222] bg-[#0a0a0a] relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-[15px] font-semibold text-white mb-1">Your Submissions</h3>
                        <p class="text-[12px] text-gray-500 font-medium">A complete historical log of your permit applications.</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#222]">
                        <thead class="bg-[#111]">
                            <tr>
                                <th class="px-5 py-3 text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wider w-1/3">Duration</th>
                                <th class="px-5 py-3 text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wider w-1/3">Type / Reason</th>
                                <th class="px-5 py-3 text-center text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#222] bg-[#0a0a0a]">
                            @forelse($permits as $permit)
                                <tr class="hover:bg-[#111] transition-colors">
                                    <td class="px-5 py-4 whitespace-nowrap">
                                        <div class="inline-flex items-center gap-2 text-[12px]">
                                            <span class="text-white">{{ \Carbon\Carbon::parse($permit->start_date)->format('M d, Y') }}</span>
                                            <span class="text-gray-600">→</span>
                                            <span class="text-white">{{ \Carbon\Carbon::parse($permit->end_date)->format('M d, Y') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-2 mb-1.5 cursor-default">
                                            @if($permit->type == 'Sakit')
                                                <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-semibold bg-gray-800 text-gray-300 border border-gray-700 uppercase tracking-wider">Sick Leave</span>
                                            @else
                                                <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-semibold bg-gray-800 text-gray-300 border border-gray-700 uppercase tracking-wider">Dispensation</span>
                                            @endif
                                        </div>
                                        <div class="text-[13px] text-gray-400 font-medium line-clamp-2 max-w-sm" title="{{ $permit->reason }}">
                                            {{ $permit->reason }}
                                        </div>
                                    </td>
                                    <td class="px-5 py-4 whitespace-nowrap text-center">
                                        @if($permit->status == 'pending')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-yellow-500/10 text-yellow-500 border border-yellow-500/20 uppercase tracking-widest"><span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mr-1.5"></span> In Queue</span>
                                        @elseif($permit->status == 'approved')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-500/10 text-emerald-500 border border-emerald-500/20 uppercase tracking-widest">Approved</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-red-500/10 text-red-500 border border-red-500/20 uppercase tracking-widest">Declined</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-5 py-16 text-center">
                                        <div class="w-12 h-12 mx-auto bg-[#111] rounded-full flex items-center justify-center mb-3 border border-[#222]">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                        </div>
                                        <h4 class="text-[14px] font-semibold text-white mb-1">No history found.</h4>
                                        <p class="text-[12px] text-gray-500">Click "Submit Request" to create a new permit application.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
