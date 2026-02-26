<section>
    <form method="post" action="{{ route('profile.update') }}" class="space-y-10">
        @csrf
        @method('patch')

        <div class="space-y-8">
            <div>
                <x-input-label for="name" :value="__('Full Identity')" />
                <x-text-input id="name" name="name" type="text" class="block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-4" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Electronic Mail')" />
                <x-text-input id="email" name="email" type="email" class="block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-4" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-6 p-4 rounded-2xl bg-amber-500/5 border border-amber-500/10">
                        <p class="text-[12px] font-bold text-amber-500/80 uppercase tracking-widest leading-loose">
                            {{ __('Your identity channel is unverified.') }}
                            <button form="send-verification" class="block mt-2 underline text-white hover:text-amber-500 transition-colors">
                                {{ __('Re-send Verification Signal') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-4 text-[11px] font-black text-emerald-500 uppercase tracking-[0.2em]">
                                {{ __('A new verification link has been sent.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-6 pt-6 border-t border-white/5">
            <x-primary-button>{{ __('Apply Changes') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-emerald-500">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-[11px] font-black uppercase tracking-[0.2em]">{{ __('Identity Updated') }}</span>
                </div>
            @endif
        </div>
    </form>
</section>
