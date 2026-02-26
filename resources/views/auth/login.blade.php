<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-white font-medium text-sm text-center" :status="session('status')" />

    <div class="mb-8 text-center">
        <h2 class="text-xl font-semibold text-white tracking-tight">Log in to portal</h2>
        <p class="text-[13px] text-gray-500 mt-2">Enter your details to access your account.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <div class="relative">
                <input id="email" class="block w-full px-3 py-2 bg-[#0a0a0a] border border-[#222] rounded-md text-white placeholder-gray-600 focus:ring-1 focus:ring-white/20 focus:border-white/20 transition-all text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email address" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <div class="relative">
                <input id="password" class="block w-full px-3 py-2 bg-[#0a0a0a] border border-[#222] rounded-md text-white placeholder-gray-600 focus:ring-1 focus:ring-white/20 focus:border-white/20 transition-all text-sm"
                                type="password"
                                name="password"
                                required autocomplete="current-password" placeholder="Password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between pt-2">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="w-3.5 h-3.5 rounded-sm border-[#333] bg-[#0a0a0a] text-white focus:ring-white/20 focus:ring-offset-0" name="remember">
                <span class="ms-2 text-[12px] text-gray-500">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-[12px] text-gray-400 hover:text-white transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full flex justify-center items-center px-4 py-2 bg-white text-black hover:bg-gray-100 rounded-md text-sm font-medium transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-white/20 focus:ring-offset-2 focus:ring-offset-black">
                Log in
            </button>
            
            <div class="mt-5 text-center">
                <a class="text-[13px] text-gray-500 hover:text-white transition-colors" href="{{ route('register') }}">
                    Don't have an account? <span class="text-white">Sign up</span>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
