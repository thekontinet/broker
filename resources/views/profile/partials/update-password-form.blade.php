<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <x-ui.text-input name="current_password" type="password" label="Current Password" class="mt-1 block w-full" autocomplete="current-password" />
        <x-ui.text-input name="password" type="password" label="New Password" class="mt-1 block w-full" autocomplete="new-password" />
        <x-ui.text-input name="password_confirmation" type="password" label="Confirm Password" class="mt-1 block w-full" autocomplete="new-password" />

        <div class="flex items-center gap-4">
            <x-ui.primary-button>{{ __('Save') }}</x-ui.primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
