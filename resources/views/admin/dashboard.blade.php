<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded border border-[#333] bg-[#1a1a1a] flex items-center justify-center text-white shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <div>
                <h2 class="font-semibold text-lg text-white tracking-tight leading-none">
                    {{ __('Admin Console') }}
                </h2>
                <span class="text-[11px] text-gray-500 font-medium tracking-widest mt-1 uppercase">Validation Center</span>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Info Cards (Linear Monochromatic) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                
                <div class="bg-[#0a0a0a] border border-[#222] p-5 rounded-xl hover:border-[#444] transition-colors relative overflow-hidden">
                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-xs font-semibold text-gray-400 flex items-center gap-2">Total Submissions</h4>
                            <div class="w-6 h-6 rounded flex items-center justify-center text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                        </div>
                        <p class="text-3xl font-semibold text-white tracking-tight">{{ $permits->count() }}</p>
                    </div>
                </div>

                <div class="bg-[#0a0a0a] border border-[#222] p-5 rounded-xl hover:border-[#444] transition-colors relative overflow-hidden">
                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-xs font-semibold text-yellow-500/80 flex items-center gap-2"><div class="w-1.5 h-1.5 rounded-full bg-yellow-500"></div> Pending Review</h4>
                            <div class="w-6 h-6 rounded flex items-center justify-center text-yellow-500/80">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-3xl font-semibold text-white tracking-tight">{{ $permits->where('status', 'pending')->count() }}</p>
                    </div>
                </div>

                <div class="bg-[#0a0a0a] border border-[#222] p-5 rounded-xl hover:border-[#444] transition-colors relative overflow-hidden">
                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-xs font-semibold text-emerald-500/80 flex items-center gap-2">Approved</h4>
                            <div class="w-6 h-6 rounded flex items-center justify-center text-emerald-500/80">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <p class="text-3xl font-semibold text-white tracking-tight">{{ $permits->where('status', 'approved')->count() }}</p>
                    </div>
                </div>

            </div>

            @if(session('success'))
                <div class="p-3 mb-8 rounded-md bg-emerald-500/10 border border-emerald-500/20 flex items-center gap-3">
                    <div class="text-emerald-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <p class="text-white font-medium text-[13px]">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Main Table Section -->
            <div class="bg-[#0a0a0a] rounded-xl overflow-hidden border border-[#222] shadow-sm">
                
                <div class="p-5 border-b border-[#222] flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-[15px] font-semibold text-white mb-1">Permit Requests</h3>
                        <p class="text-[12px] text-gray-500 font-medium">Manage and review student leave requests.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="px-2.5 py-1 rounded bg-[#111] border border-[#333] text-[11px] font-semibold text-white uppercase tracking-widest flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Live Sync
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#222]">
                        <thead class="bg-[#111]">
                            <tr>
                                <th class="px-5 py-3 text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wider w-1/4">Student</th>
                                <th class="px-5 py-3 text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wider w-1/3">Submission Details</th>
                                <th class="px-5 py-3 text-center text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Duration</th>
                                <th class="px-5 py-3 text-center text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-5 py-3 text-right text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#222] bg-[#0a0a0a]">
                            @forelse($permits as $permit)
                                <tr class="hover:bg-[#111] transition-colors">
                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-[#1a1a1a] flex items-center justify-center shrink-0 border border-[#333] overflow-hidden text-gray-300 font-bold text-xs">
                                                {{ substr($permit->user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="text-[14px] font-semibold text-white">{{ $permit->user->name }}</div>
                                                <div class="text-[12px] text-gray-500">{{ $permit->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="px-5 py-4">
                                        <div class="text-[11px] font-semibold uppercase tracking-wider text-gray-300 mb-1 flex items-center gap-1.5">
                                            @if($permit->type == 'Sakit')
                                                <svg class="w-3.5 h-3.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                            @else
                                                <svg class="w-3.5 h-3.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            @endif
                                            {{ $permit->type }}
                                        </div>
                                        <div class="text-[13px] text-gray-400 font-medium whitespace-normal max-w-sm pl-2 border-l border-[#333]" title="{{ $permit->reason }}">
                                            {{ $permit->reason }}
                                        </div>
                                    </td>
                                    
                                    <td class="px-5 py-4 whitespace-nowrap text-center">
                                        <div class="inline-flex items-center gap-2 text-[12px]">
                                            <span class="text-white">{{ \Carbon\Carbon::parse($permit->start_date)->format('M d') }}</span>
                                            <span class="text-gray-600">→</span>
                                            <span class="text-white">{{ \Carbon\Carbon::parse($permit->end_date)->format('M d') }}</span>
                                        </div>
                                    </td>
                                    
                                    <td class="px-5 py-4 whitespace-nowrap text-center">
                                        @if($permit->status == 'pending')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-yellow-500/10 text-yellow-500 border border-yellow-500/20 uppercase tracking-widest">Pending</span>
                                        @elseif($permit->status == 'approved')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-500/10 text-emerald-500 border border-emerald-500/20 uppercase tracking-widest">Approved</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-red-500/10 text-red-500 border border-red-500/20 uppercase tracking-widest">Rejected</span>
                                        @endif
                                    </td>
                                    
                                    <td class="px-5 py-4 whitespace-nowrap text-right">
                                        @if($permit->status == 'pending')
                                            <div class="flex items-center justify-end gap-1.5 text-[11px] font-semibold">
                                                <!-- Action Form Group (Approve) -->
                                                <form action="{{ route('admin.permits.update_status', $permit) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="px-3 py-1.5 bg-[#111] border border-[#333] text-gray-300 rounded hover:bg-emerald-500 hover:border-emerald-500 hover:text-white transition-all">
                                                        Approve
                                                    </button>
                                                </form>

                                                <!-- Action Form Group (Reject) -->
                                                <form action="{{ route('admin.permits.update_status', $permit) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="px-3 py-1.5 bg-[#111] border border-[#333] text-gray-300 rounded hover:bg-red-500 hover:border-red-500 hover:text-white transition-all">
                                                        Reject
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-[11px] text-gray-600 font-medium">Processed</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-5 py-16 text-center">
                                        <div class="w-12 h-12 mx-auto bg-[#111] rounded-full flex items-center justify-center mb-3 border border-[#222]">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        </div>
                                        <h4 class="text-[14px] font-semibold text-white mb-1">No pending requests</h4>
                                        <p class="text-[12px] text-gray-500">You're all caught up for now.</p>
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
