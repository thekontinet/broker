<x-app-layout>
    <div class="relative overflow-hidden">
        <!-- Gradients -->
        <div aria-hidden="true" class="flex -z-[1] absolute -top-48 start-0">
            <div class="bg-purple-200 opacity-30 blur-3xl w-[1036px] h-[600px] dark:bg-purple-900 dark:opacity-20"></div>
            <div class="bg-gray-200 opacity-90 blur-3xl w-[577px] h-[300px] transform translate-y-32 dark:bg-neutral-800/60"></div>
        </div>
        <!-- End Gradients -->

        <div class="px-4 pt-10 sm:px-6 lg:px-8 lg:pt-14 mx-auto">
            <!-- Title -->
            <div class="max-w-2xl mx-auto text-center mb-10">
                <h2 class="text-3xl leading-tight font-bold md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-700 text-transparent">Subscribe for flexible earning</h2>
                <p class="mt-2 lg:text-lg text-gray-800 dark:text-neutral-200">Commit your funds and earn commission from trades taken by expert traders</p>
            </div>
            <!-- End Title -->

            @if($message = session('error'))
                <div class="mt-2 bg-red-500 text-sm text-white rounded-lg p-4 mx-auto max-w-md" role="alert" tabindex="-1" aria-labelledby="hs-solid-color-danger-label">
                    <span id="hs-solid-color-danger-label" class="font-bold">Error: </span> {{$message}}
                </div>
            @endif

            <!-- Grid -->
            <div class="mt-6 md:mt-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6 lg:gap-3 xl:gap-6 lg:items-center">
                @foreach($plans as $plan)
                    <x-block.plan-card :plan="$plan" />
                @endforeach
            </div>
            <!-- End Grid -->
        </div>
    </div>
</x-app-layout>
