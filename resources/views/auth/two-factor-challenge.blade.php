<x-guest-layout>
    <div class="mb-4 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Two-factor authentication</h2>
        <p class="text-sm text-gray-600 mt-2">Enter the 6-digit code from your authenticator app</p>
    </div>

    <form method="POST" action="{{ route('admin.two-factor.challenge.store') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="code" :value="__('Authentication code')" />
            <x-text-input id="code" class="block mt-1 w-full tracking-[0.3em] text-center text-lg" type="text" name="code" inputmode="numeric" autocomplete="one-time-code" autofocus />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <div class="relative py-2">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-200"></div></div>
            <div class="relative flex justify-center text-xs uppercase"><span class="bg-white px-2 text-gray-400">or recovery code</span></div>
        </div>

        <div>
            <x-input-label for="recovery_code" :value="__('Recovery code')" />
            <x-text-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" autocomplete="off" />
        </div>

        <button class="w-full inline-flex justify-center items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-black focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition">
            Verify & continue
        </button>

        <div class="text-center">
            <a href="{{ route('admin.login') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Back to login</a>
        </div>
    </form>
</x-guest-layout>
