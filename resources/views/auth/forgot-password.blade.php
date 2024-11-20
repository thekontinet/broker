<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-ui.form method="POST" action="{{ route('password.email') }}">
        <!-- Email Address -->
        <x-ui.text-input type="email" name="email" label="Email" :value="old('email')" required autofocus />

        <div class="flex items-center justify-end mt-4">
            <x-ui.primary-button>
                {{ __('Email Password Reset Link') }}
            </x-ui.primary-button>
        </div>
    </x-ui.form>
</x-guest-layout>
