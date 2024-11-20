<!-- Card Section -->
<div class="">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-800">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                Profile
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                Manage profile settingss
            </p>
        </div>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <x-ui.form action="{{route('profile.update')}}" method="patch">
            <!-- Grid -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                <div class="sm:col-span-3">
                    <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        Profile photo
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <div class="flex items-center gap-5" x-data>
                        <img x-ref="image" class="inline-block size-16 rounded-full ring-2 ring-white dark:ring-neutral-900" src="https://preline.co/assets/img/160x160/img1.jpg" alt="Avatar">
                        <div class="flex gap-x-2">
                            <div>
                                <input type="file" name="avatar" id="avatar" class="hidden" @change="
                                         const file = $el.files[0];
                                        if (file) {
                                            $refs.image.src = URL.createObjectURL(file);
                                        }
                                ">
                                <label for="avatar" class="cursor-pointer py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                    Upload photo
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-3">
                    <label for="af-account-full-name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        Full name
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <div class="sm:flex gap-2">
                        <x-ui.text-input type="text" name="first_name" value="{{old('first_name', $user->firstname)}}" placeholder="First Name"/>
                        <x-ui.text-input type="text" name="last_name" value="{{old('last_name', $user->lastname)}}" placeholder="Last Name"/>
                    </div>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-3">
                    <label for="af-account-email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        Email
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <x-ui.text-input name="email" type="email" value="{{old('email', $user->email)}}" placeholder="maria@website.com"/>
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->

            <div class="mt-5 flex justify-end gap-x-2">
                <x-ui.secondary-button>
                    Cancel
                </x-ui.secondary-button>
                <x-ui.primary-button>
                    Save changes
                </x-ui.primary-button>
            </div>
        </x-ui.form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->
