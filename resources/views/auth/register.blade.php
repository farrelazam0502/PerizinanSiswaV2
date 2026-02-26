<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-xl font-semibold text-white tracking-tight">Create an account</h2>
        <p class="text-[13px] text-gray-500 mt-2">Enter your information to get started.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <div class="relative">
                <input id="name" class="block w-full px-3 py-2 bg-[#0a0a0a] border border-[#222] rounded-md text-white placeholder-gray-600 focus:ring-1 focus:ring-white/20 focus:border-white/20 transition-all text-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-500" />
        </div>

        <!-- Email Address -->
        <div>
            <div class="relative">
                <input id="email" class="block w-full px-3 py-2 bg-[#0a0a0a] border border-[#222] rounded-md text-white placeholder-gray-600 focus:ring-1 focus:ring-white/20 focus:border-white/20 transition-all text-sm" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email address" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-500" />
        </div>

        <!-- Password -->
        <div>
            <div class="relative">
                <input id="password" class="block w-full px-3 py-2 bg-[#0a0a0a] border border-[#222] rounded-md text-white placeholder-gray-600 focus:ring-1 focus:ring-white/20 focus:border-white/20 transition-all text-sm"
                                type="password"
                                name="password"
                                required autocomplete="new-password" placeholder="Password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div>
            <div class="relative">
                <input id="password_confirmation" class="block w-full px-3 py-2 bg-[#0a0a0a] border border-[#222] rounded-md text-white placeholder-gray-600 focus:ring-1 focus:ring-white/20 focus:border-white/20 transition-all text-sm"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-500" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full flex justify-center items-center px-4 py-2 bg-white text-black hover:bg-gray-100 rounded-md text-sm font-medium transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-white/20 focus:ring-offset-2 focus:ring-offset-black">
                Create account
            </button>
            <div class="mt-5 text-center">
                <a class="text-[13px] text-gray-500 hover:text-white transition-colors" href="{{ route('login') }}">
                    Already have an account? <span class="text-white">Log in</span>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
