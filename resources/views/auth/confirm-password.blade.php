<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <x-ui.form method="POST" action="{{ route('password.confirm') }}">
        <!-- Password -->
        <div>
            <x-ui.text-input id="password" class="block mt-1 w-full"
                            label="Password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
        </div>

        <div class="flex justify-end mt-4">
            <x-ui.primary-button>
                {{ __('Confirm') }}
            </x-ui.primary-button>
        </div>
    </x-ui.form>
</x-guest-layout>
