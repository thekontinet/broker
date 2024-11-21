<!-- Sidebar -->
<div id="hs-application-sidebar" class="hs-overlay  [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform  w-[260px] h-full  hidden  fixed inset-y-0 start-0 z-[60] bg-white border-e border-gray-200 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <div class="px-6 pt-4">
            <!-- Logo -->
           <x-application-logo/>
            <!-- End Logo -->
        </div>

        <!-- Content -->
        <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            <x-ui.nav>
                <x-ui.nav-link href="{{route('dashboard')}}" :active="request()->routeIs('dashboard')">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Dashboard
                </x-ui.nav-link>
                <x-ui.nav-link href="{{route('markets.index', \App\Enums\AssetTypeEnum::CRYPTO->value)}}" :active="request()->routeIs('markets.*')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd" d="M1.75 2a.75.75 0 0 0 0 1.5H2V9a2 2 0 0 0 2 2h.043l-1.005 3.013a.75.75 0 0 0 1.423.474L4.624 14h6.752l.163.487a.75.75 0 0 0 1.423-.474L11.957 11H12a2 2 0 0 0 2-2V3.5h.25a.75.75 0 0 0 0-1.5H1.75Zm8.626 9 .5 1.5H5.124l.5-1.5h4.752Zm1.317-5.833a.75.75 0 0 0-.892-1.206 8.789 8.789 0 0 0-2.465 2.814L7.28 5.72a.75.75 0 0 0-1.06 0l-2 2a.75.75 0 0 0 1.06 1.06l1.47-1.47L8.028 8.59a.75.75 0 0 0 1.228-.255 7.275 7.275 0 0 1 2.437-3.167Z" clip-rule="evenodd" />
                    </svg>
                    Markets
                </x-ui.nav-link>
                <x-ui.nav-link href="{{route('stakes.index')}}" :active="request()->routeIs('stakes.*')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd" d="M1.75 2a.75.75 0 0 0 0 1.5H2V9a2 2 0 0 0 2 2h.043l-1.005 3.013a.75.75 0 0 0 1.423.474L4.624 14h6.752l.163.487a.75.75 0 0 0 1.423-.474L11.957 11H12a2 2 0 0 0 2-2V3.5h.25a.75.75 0 0 0 0-1.5H1.75Zm8.626 9 .5 1.5H5.124l.5-1.5h4.752Zm1.317-5.833a.75.75 0 0 0-.892-1.206 8.789 8.789 0 0 0-2.465 2.814L7.28 5.72a.75.75 0 0 0-1.06 0l-2 2a.75.75 0 0 0 1.06 1.06l1.47-1.47L8.028 8.59a.75.75 0 0 0 1.228-.255 7.275 7.275 0 0 1 2.437-3.167Z" clip-rule="evenodd" />
                    </svg>
                    Staking
                </x-ui.nav-link>
            </x-ui.nav>
        </div>
        <!-- End Content -->
    </div>
</div>
<!-- End Sidebar -->
