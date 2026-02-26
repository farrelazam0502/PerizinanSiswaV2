<section class="space-y-6">
    <div class="flex items-center gap-6">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >{{ __('Execute Termination') }}</x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-12 relative overflow-hidden">
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-rose-500/10 rounded-full blur-2xl"></div>
            
            @csrf
            @method('delete')

            <h2 class="text-3xl font-black text-white tracking-tighter mb-4 italic">
                Final Confirmation.
            </h2>

            <p class="text-gray-500 font-bold text-sm leading-relaxed mb-10 max-w-lg">
                {{ __('Once your terminal access is terminated, all encrypted resources and transaction history will be purged. This process is final and cannot be halted.') }}
            </p>

            <div class="space-y-6">
                <x-input-label for="password" value="{{ __('Authorize Deletion with Hash') }}" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full"
                    placeholder="{{ __('Your Private Key') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-12 flex items-center justify-end gap-6 pt-10 border-t border-white/5">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Abort') }}
                </x-secondary-button>

                <x-danger-button>
                    {{ __('Purge Identity') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
