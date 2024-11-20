<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <x-ui.form method="POST">
        <div class="space-y-4 flex flex-col">
            <x-ui.primary-button class="justify-center" formaction="{{ route('verification.send') }}">
                {{ __('Resend Verification Email') }}
            </x-ui.primary-button>
            <x-ui.secondary-button type="submit" class="justify-center" formaction="{{ route('logout') }}">
                {{ __('Logout') }}
            </x-ui.secondary-button>
        </div>
    </x-ui.form>
</x-guest-layout>
