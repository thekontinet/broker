<x-app-layout>
    <x-slot name="title">Staking Pool</x-slot>

    <section class="">
        <header class="mb-2">
            <h4 class="font-bold">Available Stakes</h4>
        </header>
        <div class="grid lg:grid-cols-3 gap-4 items-start shadow rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
            @foreach($pools as $pool)
                <div class="relative flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 space-y-3">
                    <div class="absolute top-4 right-4">
                        @if($pool->isStakable())
                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">Available</span>
                        @elseif(!$pool->start_date->isPast())
                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-50 text-gray-500 dark:bg-white/10 dark:text-white">Not Available</span>
                        @else
                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-50 text-gray-500 dark:bg-white/10 dark:text-white">Ended</span>
                        @endif
                    </div>
                    <div class="flex flex-col justify-between">
                        <div class="flex gap-1">
                            <div class="flex -space-x-2">
                                <img class="inline-block size-8 rounded-full ring-2 ring-white dark:ring-neutral-900" src="{{ $pool->image }}" alt="Avatar" />
                                <img class="inline-block size-8 rounded-full ring-2 ring-white dark:ring-neutral-900" src="{{ $pool->asset->image }}" alt="Avatar">
                            </div>
                            <h4 class="font-bold text-lg dark:text-gray-100">{{ $pool->name }}</h4>
                        </div>

                        <p class="text-sm mt-2">{{$pool->meta['description'] ?? null}}</p>

                        <ul class="mt-4 space-y-2">
                            <li class="text-xs">
                                <strong>Duration:</strong>
                                <span>{{$pool->start_date->format('Y-m-d')}} - {{$pool->end_date->format('Y-m-d')}}</span>
                            </li>
                            <li class="text-xs">
                                <strong><abbr title="Annual Profit Returns">APR:</abbr></strong>
                                <span>{{$pool->apr}}%</span>
                            </li>
                            <li class="text-xs">
                                <strong>Participants:</strong>
                                <span>{{$pool->getMeta('participants', 0)}}</span>
                            </li>
                            <li class="text-xs">
                                <strong>Total Stake:</strong>
                                <span>{{money($pool->getMeta('total_stake', 0), $pool->asset->symbol)}}</span>
                            </li>
                            <li class="text-sm pt-4">
                                <strong>Minimum stake:</strong>
                                <span>{{money($pool->min_amount, $pool->asset->symbol)}}</span>
                            </li>
                        </ul>
                    </div>

                    <div x-data="{open:@js($errors->has('amount'))}">
                        <button x-show="!open" class="absolute inset-0" x-on:click="open = !open"></button>
                        @if($pool->isStakable())
                            {{-- Staking Form --}}
                            <x-ui.form x-cloak x-show="open==true" action="{{ route('stakes.store') }}" method="POST">
                                <x-ui.text-input type="text" name="amount" label="Amount" required />
                                <div>
                                    <x-ui.text-input type="hidden" value="{{ $pool->id }}" name="pool_id" required />
                                </div>
                                <div class="flex items-center justify-between gap-1">
                                    <x-ui.primary-button class="justify-center mt-4 w-full">Deposit</x-ui.primary-button>
                                    <x-ui.secondary-button @click="open=false" class="justify-center mt-4 w-full">Cancel</x-ui.secondary-button>
                                </div>
                            </x-ui.form>
                        @else
                            <div  x-cloak x-show="open==true" class="bg-gray-50 border border-gray-200 text-sm text-gray-600 rounded-lg p-4 dark:bg-white/10 dark:border-white/10 dark:text-neutral-400" role="alert" tabindex="-1" aria-labelledby="hs-link-on-right-label">
                                <div class="flex">
                                    <div class="shrink-0">
                                        <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M12 16v-4"></path>
                                            <path d="M12 8h.01"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1 md:flex md:justify-between ms-2">
                                        <p id="hs-link-on-right-label" class="text-sm">
                                            This pool is not open for staking
                                        </p>
                                        <p class="text-sm mt-3 md:mt-0 md:ms-6">
                                            <button @click="open=false" class="text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 font-medium whitespace-nowrap dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm2.78-4.22a.75.75 0 0 1-1.06 0L8 9.06l-1.72 1.72a.75.75 0 1 1-1.06-1.06L6.94 8 5.22 6.28a.75.75 0 0 1 1.06-1.06L8 6.94l1.72-1.72a.75.75 0 1 1 1.06 1.06L9.06 8l1.72 1.72a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section>
        <header class="mb-2">
            <h4 class="font-bold">My Stakes</h4>
        </header>
        <div class="grid lg:grid-cols-3 gap-4">
            @foreach($stakes as $stake)
                <div class="relative flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 space-y-3">
                    @if(!$stake->pool->hasEnded())
                        <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500 absolute top-4 right-1">Live</span>
                    @else
                        <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800/30 dark:text-green-500 absolute top-4 right-1">Complete</span>
                    @endif
                    <div class="flex flex-col justify-between">
                        <div class="flex gap-1">
                            <div class="flex -space-x-2">
                                <img class="inline-block size-8 rounded-full ring-2 ring-white dark:ring-neutral-900" src="{{ $stake->pool->image }}" alt="Avatar" />
                                <img class="inline-block size-8 rounded-full ring-2 ring-white dark:ring-neutral-900" src="{{ $stake->pool->asset->image }}" alt="Avatar">
                            </div>
                            <h4 class="font-bold text-lg dark:text-gray-100">{{ $stake->pool->name }}</h4>
                        </div>

                        <p class="text-sm mt-2">{{$stake->pool->meta['description'] ?? null}}</p>

                        <ul class="mt-4 space-y-2">
                            <li class="text-xs">
                                <strong>Duration:</strong>
                                <span>{{$stake->pool->start_date->format('Y-m-d')}} - {{$stake->pool->end_date->format('Y-m-d')}}</span>
                            </li>
                            <li class="text-xs">
                                <strong><abbr title="Annual Profit Returns">APR:</abbr></strong>
                                <span>{{$stake->pool->apr}}%</span>
                            </li>
                            <li class="text-xs">
                                <strong>Participants:</strong>
                                <span>{{$stake->pool->getMeta('participants', 0)}}</span>
                            </li>
                            <li class="text-xs">
                                <strong>Total Stake:</strong>
                                <span>{{money($stake->pool->getMeta('total_stake', 0), $stake->pool->asset->symbol)}}</span>
                            </li>
                            <li class="text-sm pt-4">
                                <strong>Minimum stake:</strong>
                                <span>{{money($stake->pool->min_amount, $stake->pool->asset->symbol)}}</span>
                            </li>
                            <li class="text-sm">
                                <strong>Amount staked:</strong>
                                <span>{{money($stake->amount, $stake->pool->asset->symbol)}}</span>
                            </li>
                        </ul>
                    </div>

                    @if($stake->pool->hasEnded())
                        <div x-data="{open:@js($errors->has('amount'))}">
                            <button x-show="!open" class="absolute inset-0" x-on:click="open = !open"></button>
                                {{-- Staking Form --}}
                                <x-ui.form x-cloak x-show="open==true" action="{{ route('stakes.destroy', $stake) }}" method="delete">
                                    <x-ui.primary-button class="w-full justify-center">Withdraw</x-ui.primary-button>
                                </x-ui.form>
                            </div>
                        </div>
                    @endif
            @endforeach
        </div>
    </section>
</x-app-layout>
