<x-guest-layout>
    <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign In</h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
            Don't have an account ?
            <x-ui.link href="{{route('register')}}">
                Sign up here
            </x-ui.link>
        </p>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form -->
    <x-ui.form action="{{route('login')}}" method="post">
        <div class="space-y-4">
            <x-ui.text-input type="email" label="Email" name="email" :value="old('email')" placeholder="Email Address"/>
            <x-ui.text-input type="password" label="Password" name="password" placeholder="Password"/>
            <div class="flex items-center justify-between">
                <x-ui.checkbox label="Remember Me" name="remember"/>
                <x-ui.link href="{{route('password.request')}}" class="text-sm">Forgot Password ?</x-ui.link>
            </div>

            <x-ui.primary-button type="submit" class="w-full">
                Sign In
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 ms-auto">
                    <path d="M11.25 2A2.75 2.75 0 0 1 14 4.75v6.5A2.75 2.75 0 0 1 11.25 14h-3a2.75 2.75 0 0 1-2.75-2.75v-.5a.75.75 0 0 1 1.5 0v.5c0 .69.56 1.25 1.25 1.25h3c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25h-3C7.56 3.5 7 4.06 7 4.75v.5a.75.75 0 0 1-1.5 0v-.5A2.75 2.75 0 0 1 8.25 2h3Z" />
                    <path d="M7.97 6.28a.75.75 0 0 1 1.06-1.06l2.25 2.25a.75.75 0 0 1 0 1.06l-2.25 2.25a.75.75 0 1 1-1.06-1.06l.97-.97H1.75a.75.75 0 0 1 0-1.5h7.19l-.97-.97Z" />
                </svg>
            </x-ui.primary-button>
        </div>
    </x-ui.form>
    <!-- End Form -->
</x-guest-layout>
