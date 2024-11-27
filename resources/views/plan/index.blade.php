<x-app-layout>
    <header class="flex items-center">
        <h2 class="font-semibold py-2">Plans</h2>
    </header>

    <div class="grid grid-cols-2 gap-5">
        @foreach($plans as $plan)
        <div class="flex flex-col text-sm bg-white text-gray-800 dark:text-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
                <p class="mt-1 font-bold capitalize">
                    {{$plan->name}}
                </p>
            </div>
            <div class="p-4 md:p-5 space-y-3">
                <div>
                    <h3 class="font-bold">
                        Minimum investment
                    </h3>
                    <p class="text-gray-500 dark:text-neutral-400">
                        {{$plan->min_amount}}
                    </p>
                </div>
                <div>
                    <h3 class="font-bold mb-2">
                        Details
                    </h3>
                    <div class="flex items-center text-sm gap-4">
                        <span class="flex flex-col md:px-4 md:py-2 bg-white border rounded dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                            <h3 class="text-xs text-gray-800 dark:text-white">
                                Duration
                            </h3>
                            <p class="font-bold text-gray-500 dark:text-neutral-400">
                                {{$plan->duration}} Days
                            </p>
                        </span>
                        <span class="flex flex-col md:px-4 md:py-2 bg-white border rounded dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                            <h3 class="text-xs text-gray-800 dark:text-white">
                                ROI
                            </h3>
                            <p class="font-bold text-gray-500 dark:text-neutral-400">
                                {{$plan->ROI}} %
                            </p>
                        </span>
                    </div>
                </div>

                <x-ui.form method="POST" action="{{route('plans.store')}}">
                    <x-ui.text-input type="hidden" name="plan_id" value="{{$plan->id}}" required />
                    <x-ui.text-input placeholder="Amount" type="number" name="amount" label="Amount" required />
                    <x-ui.primary-button class="w-full justify-center mt-5">Subscribe</x-ui.primary-button>
                </x-ui.form>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>