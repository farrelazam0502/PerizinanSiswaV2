<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-10">
        @csrf
        @method('put')

        <div class="space-y-8">
            <div>
                <x-input-label for="update_password_current_password" :value="__('Current Hash')" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-4" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <x-input-label for="update_password_password" :value="__('New Private Key')" />
                    <x-text-input id="update_password_password" name="password" type="password" class="block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-4" />
                </div>

                <div>
                    <x-input-label for="update_password_password_confirmation" :value="__('Re-confirm Key')" />
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-4" />
                </div>
            </div>
        </div>

        <div class="flex items-center gap-6 pt-6 border-t border-white/5">
            <x-primary-button>{{ __('Rotate Secret') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-emerald-500">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-[11px] font-black uppercase tracking-[0.2em]">{{ __('Security Rotated') }}</span>
                </div>
            @endif
        </div>
    </form>
</section>
