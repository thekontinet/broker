@props(['plan'])
<!-- Card -->
<div class="flex flex-col bg-white border border-gray-200 text-center rounded-2xl p-4 md:p-8 dark:bg-neutral-900 dark:border-neutral-800">
    <h4 class="font-medium text-lg text-gray-800 dark:text-neutral-200">{{$plan->name}}</h4>
    <span class="mt-7 font-bold text-3xl md:text-4xl xl:text-5xl text-gray-800 dark:text-neutral-200">{{money($plan->min_amount)}}</span>
    <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">Get started with basic features</p>

    <ul class="mt-7 space-y-2.5 text-sm">
        @foreach($plan->meta['benefits'] ?? [] as $benefit)
            <li class="flex gap-x-2">
                <svg class="shrink-0 mt-0.5 size-4 text-violet-900" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                <span class="text-gray-800 dark:text-neutral-400">
                  {{$benefit}}
                </span>
            </li>
        @endforeach
    </ul>

    <x-ui.form action="{{route('subscriptions.store')}}" method="post" class="mt-4" onsubmit="return confirm('You are about to subscribe to a plan. are you sure about this ?')">
        <x-ui.primary-button class="w-full justify-center">Subscribe</x-ui.primary-button>
        <input type="hidden" name="plan_id" value="{{$plan->id}}">
        <input type="hidden" name="amount" value="{{$plan->min_amount}}">
    </x-ui.form>
</div>
<!-- End Card -->
