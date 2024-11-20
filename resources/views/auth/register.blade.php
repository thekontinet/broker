<x-guest-layout>
    <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Open Account</h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
           Already have an account ?
            <x-ui.link href="{{route('login')}}">
                Sign in here
            </x-ui.link>
        </p>
    </div>

    <div class="mt-5">
        <!-- Form -->
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="grid gap-y-4">
                <x-ui.text-input label="First Name" name="first_name" :value="old('first_name')" placeholder="ex. John"/>
                <x-ui.text-input label="Last Name" name="last_name" :value="old('last_name')" placeholder="ex. Doe"/>
                <x-ui.text-input type="email" label="Email" name="email" :value="old('email')" placeholder="ex. johndoe@email.com"/>
                <x-ui.text-input type="password" label="Password" name="password" placeholder="Password"/>
                <x-ui.text-input type="password" label="Confirm Password" name="password_confirmation" placeholder="Confirm Password"/>

                <x-ui.primary-button type="submit">
                    Sign up
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 ms-auto">
                        <path fill-rule="evenodd" d="M2 8c0 .414.336.75.75.75h8.69l-1.22 1.22a.75.75 0 1 0 1.06 1.06l2.5-2.5a.75.75 0 0 0 0-1.06l-2.5-2.5a.75.75 0 1 0-1.06 1.06l1.22 1.22H2.75A.75.75 0 0 0 2 8Z" clip-rule="evenodd" />
                    </svg>
                </x-ui.primary-button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</x-guest-layout>
