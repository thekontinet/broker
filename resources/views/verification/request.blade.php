<x-app-layout>
    <x-slot:title>
        Verify Account
    </x-slot:title>

    <section class="max-w-lg">
        <header class="mb-4">
            <p class="text-xs text-red-600 bg-red-300 rounded p-2">Your account is currently unverified. To ensure full access to all features and services, please complete the verification process by filling out the form below. This will help us confirm your identity and secure your account.</p>
        </header>
        <x-ui.form class="space-y-4" method="post" enctype="multipart/form-data">
            <x-ui.select name='type'>
                <option selected>Select Document Type</option>
                @foreach ($options as $option)
                    <option value="{{ $option->value }}">{{ $option->value }}</option>
                @endforeach
            </x-ui.select>
            <div>
                <label for="upload" class="border border-dotted min-h-40 w-full dark:border-neutral-500 rounded-lg grid place-items-center" x-data="{ preview: null }">
                    <div class="text-center" x-show="!preview">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="dark:text-neutral-600 size-6 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                              </svg>                      
                        </span>
                        <span class="text-xs dark:text-neutral-600">Click to upload documents</span>
                    </div>
                    <div class="p-4" x-show="preview">
                        <img :src="preview" class="h-40 w-full object-cover rounded-lg">
                    </div>
                    <input type="file" id="upload" name="document" @change="preview = URL.createObjectURL($event.target.files[0])" hidden>
                </label>
                @error('document')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <x-ui.primary-button>Request Verification</x-ui.primary-button>
        </x-ui.form>
    </section>
</x-app-layout>
