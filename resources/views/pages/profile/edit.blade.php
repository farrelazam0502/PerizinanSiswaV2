<x-app-layout>
    <x-slot name="header">
        <div class="space-y-4">
            <div class="flex items-center gap-3">
                <div class="px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-[10px] font-black text-indigo-500 uppercase tracking-[0.2em]">
                    Vault Security
                </div>
            </div>
            <h2 class="text-5xl font-black text-white tracking-tighter leading-none italic">
                Identity <br>
                <span class="text-gray-600">Calibration.</span>
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-12 pb-32">
        
        <!-- Profile Form Section -->
        <div class="glass p-10 sm:p-16 rounded-[4rem] group relative overflow-hidden transition-all duration-700 hover:border-white/10">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-500/5 rounded-full blur-3xl group-hover:bg-indigo-500/10 transition-colors duration-700"></div>
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-3 gap-16">
                <div class="lg:col-span-1">
                    <h3 class="text-2xl font-black text-white tracking-tight">Personal Core</h3>
                    <p class="text-gray-500 font-bold text-[12px] uppercase tracking-widest mt-4 leading-relaxed">Fundamental identification data used for permit verification and institutional logging.</p>
                </div>
                <div class="lg:col-span-2 max-w-2xl">
                    @include('pages.profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <!-- Password Section -->
        <div class="glass p-10 sm:p-16 rounded-[4rem] group relative overflow-hidden transition-all duration-700 hover:border-white/10">
             <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-cyan-500/5 rounded-full blur-3xl group-hover:bg-cyan-500/10 transition-colors duration-700"></div>
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-3 gap-16">
                <div class="lg:col-span-1">
                    <h3 class="text-2xl font-black text-white tracking-tight">Security Protocol</h3>
                    <p class="text-gray-500 font-bold text-[12px] uppercase tracking-widest mt-4 leading-relaxed">Update your authentication credentials to maintain the integrity of your digital terminal.</p>
                </div>
                <div class="lg:col-span-2 max-w-2xl">
                    @include('pages.profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="glass p-10 sm:p-16 rounded-[4rem] border-rose-500/10 bg-rose-500/[0.01] group relative overflow-hidden transition-all duration-700 hover:border-rose-500/20">
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-3 gap-16">
                <div class="lg:col-span-1">
                    <h3 class="text-2xl font-black text-rose-500 tracking-tight">Deactivation Zone</h3>
                    <p class="text-rose-500/40 font-bold text-[12px] uppercase tracking-widest mt-4 leading-relaxed">Permanently terminate your terminal access. This action is irreversible and will erase all transaction logs.</p>
                </div>
                <div class="lg:col-span-2 max-w-2xl">
                    @include('pages.profile.partials.delete-user-form')
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
