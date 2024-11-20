<x-guest-layout>
    <x-ui.form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <x-ui.text-input type="email" name="email" label="Email" :value="old('email', $request->email)" required autofocus autocomplete="username" />

        <!-- Password -->
        <x-ui.text-input type="password" name="password" label="Password" required autocomplete="new-password" />

        <x-ui.text-input type="password" name="password_confirmation" label="Confirm Password" required autocomplete="new-password" />

        <div class="flex items-center justify-end mt-4">
            <x-ui.primary-button>
                {{ __('Reset Password') }}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 ms-auto">
                    <path fill-rule="evenodd" d="M2 8c0 .414.336.75.75.75h8.69l-1.22 1.22a.75.75 0 1 0 1.06 1.06l2.5-2.5a.75.75 0 0 0 0-1.06l-2.5-2.5a.75.75 0 1 0-1.06 1.06l1.22 1.22H2.75A.75.75 0 0 0 2 8Z" clip-rule="evenodd" />
                </svg>
            </x-ui.primary-button>
        </div>
    </x-ui.form>
</x-guest-layout>
