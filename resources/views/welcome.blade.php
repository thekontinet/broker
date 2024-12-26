<x-page-layout>
    <!-- Hero -->
    <section class="relative bg-gradient-to-bl from-blue-100 via-transparent dark:from-blue-950 dark:via-transparent" x-init="
        Gsap.fromTo('.slide-in-left', {xPercent: -150, opacity:0}, {xPercent:0, opacity: 1,  duration:1.5, stagger: 0.7})
        Gsap.fromTo('.slide-in-right', {xPercent: 150, opacity:0}, {xPercent:0, opacity: 1,  duration:1.5, stagger: 0.7})
    ">
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Grid -->
            <div class="grid items-center md:grid-cols-2 gap-8 lg:gap-12">
                <div>
                    <p class="slide-in-left inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent dark:from-blue-400 dark:to-violet-400">
                        {{ config('app.name') }}
                    </p>

                    <!-- Title -->
                    <div class="mt-4 md:mb-12 max-w-2xl">
                        <h1 class="slide-in-left mb-4 font-semibold text-gray-800 text-4xl lg:text-5xl dark:text-neutral-200">
                            Your Premier Access to the Financial Markets
                        </h1>
                        <p class="slide-in-left text-gray-600 dark:text-neutral-400">
                            Discover a platform that opens the door to trading and investing with confidence. Whether you're an experienced trader or just getting started, we provide the tools, insights, and support you need to make the most of the financial markets.
                        </p>
                    </div>
                    <!-- End Title -->

                    <!-- Blockquote -->
                    <blockquote class="hidden md:block relative max-w-sm slide-in-left">
                        <svg class="absolute top-0 start-0 transform -translate-x-6 -translate-y-8 size-16 text-gray-200 dark:text-neutral-800" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M7.39762 10.3C7.39762 11.0733 7.14888 11.7 6.6514 12.18C6.15392 12.6333 5.52552 12.86 4.76621 12.86C3.84979 12.86 3.09047 12.5533 2.48825 11.94C1.91222 11.3266 1.62421 10.4467 1.62421 9.29999C1.62421 8.07332 1.96459 6.87332 2.64535 5.69999C3.35231 4.49999 4.33418 3.55332 5.59098 2.85999L6.4943 4.25999C5.81354 4.73999 5.26369 5.27332 4.84476 5.85999C4.45201 6.44666 4.19017 7.12666 4.05926 7.89999C4.29491 7.79332 4.56983 7.73999 4.88403 7.73999C5.61716 7.73999 6.21938 7.97999 6.69067 8.45999C7.16197 8.93999 7.39762 9.55333 7.39762 10.3ZM14.6242 10.3C14.6242 11.0733 14.3755 11.7 13.878 12.18C13.3805 12.6333 12.7521 12.86 11.9928 12.86C11.0764 12.86 10.3171 12.5533 9.71484 11.94C9.13881 11.3266 8.85079 10.4467 8.85079 9.29999C8.85079 8.07332 9.19117 6.87332 9.87194 5.69999C10.5789 4.49999 11.5608 3.55332 12.8176 2.85999L13.7209 4.25999C13.0401 4.73999 12.4903 5.27332 12.0713 5.85999C11.6786 6.44666 11.4168 7.12666 11.2858 7.89999C11.5215 7.79332 11.7964 7.73999 12.1106 7.73999C12.8437 7.73999 13.446 7.97999 13.9173 8.45999C14.3886 8.93999 14.6242 9.55333 14.6242 10.3Z" fill="currentColor"/>
                        </svg>

                        <div class="relative z-10">
                            <p class="text-xl italic text-gray-800 dark:text-white">
                                This platform has completely transformed the way I approach trading. The insights are clear, timely, and incredibly helpful. It’s like having a trusted partner guiding you every step of the way. I’ve seen real growth in my portfolio since I joined.
                            </p>
                        </div>

                        <footer class="mt-3">
                            <div class="flex items-center gap-x-4">
                                <div class="shrink-0">
                                    <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
                                </div>
                                <div class="grow">
                                    <div class="font-semibold text-gray-800 dark:text-neutral-200">Alexandra Martinez</div>
                                    <div class="text-xs text-gray-500 dark:text-neutral-500">Fintech Innovators | Senior Portfolio Manager</div>
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                    <!-- End Blockquote -->
                </div>
                <!-- End Col -->

                <div>
                    <!-- Form -->
                    <form action="{{ route('register') }}">
                        <div class="lg:max-w-lg lg:mx-auto lg:me-0 ms-auto slide-in-right">
                            <!-- Card -->
                            <div class="p-4 sm:p-7 flex flex-col bg-white rounded-2xl shadow-lg dark:bg-neutral-900">
                                <div class="text-center">
                                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Create a free account</h1>
                                    <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                                        Already have an account?
                                        <a class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500" href="{{ route('login') }}">
                                            Sign in here
                                        </a>
                                    </p>
                                </div>

                                <div class="mt-5">
                                    <x-ui.text-input name="email" placeholder="Email Address" label="Enter your email to get started"/>

                                    <div class="mt-5">
                                        <x-ui.primary-button type="submit">Get started</x-ui.primary-button>
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Clients Section -->
    </section>
    <div class="relative">
        <x-block.tradingview-ticker-2/>
        <div class="absolute inset-0 bg-gradient-to-l from-black/50 to-black/50"></div>
    </div>
    <!-- End Hero -->

    <!-- Features -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid items-center lg:grid-cols-12 gap-6 lg:gap-12">
            <div class="lg:col-span-4">
                <!-- Stats -->
                <div class="lg:pe-6 xl:pe-12">
                    <p class="text-6xl font-bold leading-10 text-blue-600">
                        92%
                        <span class="ms-1 inline-flex items-center gap-x-1 bg-gray-200 font-medium text-gray-800 text-xs leading-4 rounded-full py-0.5 px-2 dark:bg-neutral-800 dark:text-neutral-300">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                        </svg>
                        +7% this month
                      </span>
                    </p>
                    <p class="mt-2 sm:mt-3 text-gray-500 dark:text-neutral-500">of users have traded cryptocurrencies using our platform</p>
                </div>
                <!-- End Stats -->
            </div>
            <!-- End Col -->

            <div class="lg:col-span-8 relative lg:before:absolute lg:before:top-0 lg:before:-start-12 lg:before:w-px lg:before:h-full lg:before:bg-gray-200 lg:before:dark:bg-neutral-700">
                <div class="grid gap-6 grid-cols-2 md:grid-cols-4 lg:grid-cols-3 sm:gap-8">
                    <!-- Stats -->
                    <div>
                        <p class="text-3xl font-semibold text-blue-600">99.95%</p>
                        <p class="mt-1 text-gray-500 dark:text-neutral-500">successful transactions</p>
                    </div>
                    <!-- End Stats -->

                    <!-- Stats -->
                    <div>
                        <p class="text-3xl font-semibold text-blue-600">2,000+</p>
                        <p class="mt-1 text-gray-500 dark:text-neutral-500">cryptocurrencies supported</p>
                    </div>
                    <!-- End Stats -->

                    <!-- Stats -->
                    <div>
                        <p class="text-3xl font-semibold text-blue-600">85%</p>
                        <p class="mt-1 text-gray-500 dark:text-neutral-500">customer satisfaction rate</p>
                    </div>
                    <!-- End Stats -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Features -->

    <!-- Icon Blocks -->
    <section class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-12">
            <div class="lg:w-3/4">
                <h2 class="text-3xl text-gray-800 font-bold lg:text-4xl dark:text-white">
                    Tools That Simplify and Enhance Your Trading Experience
                </h2>
                <p class="mt-3 text-gray-800 dark:text-neutral-400">
                    Trading doesn’t have to be complicated. With our easy-to-use tools, you can analyze markets, make informed decisions, and stay ahead with confidence. Whether you’re just starting or looking to level up your skills, we’re here to make trading simpler and more rewarding for you
                </p>
            </div>
            <!-- End Col -->

            <div class="space-y-6 lg:space-y-10" x-init="
                    Gsap.from('.icon-block', {xPercent: 150, duration: 2, stagger: 1, scrollTrigger: {trigger: '.icon-block', start: 'center center'}})
            ">
                <!-- Icon Block -->
                <div class="flex gap-x-5 sm:gap-x-8 icon-block">
                    <!-- Icon -->
                    <span class="shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm mx-auto dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200">
                      <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    </span>
                    <div class="grow">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Advanced Charting Tools for Smarter Trading
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-neutral-400">
                            Visualize market trends like never before with powerful charting tools designed for traders of all levels.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="flex gap-x-5 sm:gap-x-8 icon-block">
                    <!-- Icon -->
                    <span class="shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm mx-auto dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200">
                      <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
                    </span>
                    <div class="grow">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Powerful trading algorithm
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-neutral-400">
                            Stay ahead in the market with our cutting-edge trading algorithms. Designed to analyze data, identify trends, and optimize trades in real-time, these tools give you the edge you need to trade confidently and efficiently
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="flex gap-x-5 sm:gap-x-8 icon-block">
                    <!-- Icon -->
                    <span class="shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm mx-auto dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200">
                      <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 10v12"/><path d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z"/></svg>
                    </span>
                    <div class="grow">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            24/7 Technical Support
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-neutral-400">
                            Our dedicated support team is always here to help. Whether you have a quick question or need assistance with a more complex issue, we’re just a message away.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </section>
    <!-- End Icon Blocks -->


    <!-- Approach -->
    <section class="bg-neutral-900">
        <!-- Approach -->
        <div class="max-w-5xl px-4 xl:px-0 py-10 lg:pt-20 lg:pb-20 mx-auto">
            <!-- Title -->
            <div class="max-w-3xl mb-10 lg:mb-14">
                <h2 class="text-white font-semibold text-2xl md:text-4xl md:leading-tight">Getting Started is Easy: Your Journey Begins Here</h2>
                <p class="mt-1 text-neutral-400">Whether you’re a beginner or an experienced trader, we’ve got everything you need to succeed right at your fingertips</p>
            </div>
            <!-- End Title -->

            <!-- Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 lg:items-center">
                <div class="aspect-w-16 aspect-h-9 lg:aspect-none" x-data x-init="
                    Gsap.to($refs.image, {y: 40, duration: 2, repeat: -1, yoyo: true})
                ">
                    <img x-ref="image" class="w-full object-cover rounded-xl" src="/images/mobile-mockup.png" alt="Features Image">
                </div>
                <!-- End Col -->

                <!-- Timeline -->
                <div>
                    <!-- Heading -->
                    <div class="mb-4">
                        <h3 class="text-[#ff0] text-xs font-medium uppercase">
                            Steps
                        </h3>
                    </div>
                    <!-- End Heading -->

                    <!-- Item -->
                    <div class="flex gap-x-5 ms-1">
                        <!-- Icon -->
                        <div class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
                            <div class="relative z-10 size-8 flex justify-center items-center">
                              <span class="flex shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#ff0] font-semibold text-xs uppercase rounded-full">
                                1
                              </span>
                            </div>
                        </div>
                        <!-- End Icon -->

                        <!-- Right Content -->
                        <div class="grow pt-0.5 pb-8 sm:pb-12">
                            <p class="text-sm lg:text-base text-neutral-400">
                                <span class="text-white">Create an account</span>
                                Provide your basic information to create an account
                            </p>
                        </div>
                        <!-- End Right Content -->
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="flex gap-x-5 ms-1">
                        <!-- Icon -->
                        <div class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
                            <div class="relative z-10 size-8 flex justify-center items-center">
                              <span class="flex shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#ff0] font-semibold text-xs uppercase rounded-full">
                                2
                              </span>
                            </div>
                        </div>
                        <!-- End Icon -->

                        <!-- Right Content -->
                        <div class="grow pt-0.5 pb-8 sm:pb-12">
                            <p class="text-sm lg:text-base text-neutral-400">
                                <span class="text-white">Make your first deposit</span>
                                Proceed to depositing find into your account
                            </p>
                        </div>
                        <!-- End Right Content -->
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="flex gap-x-5 ms-1">
                        <!-- Icon -->
                        <div class="relative last:after:hidden after:absolute after:top-8 after:bottom-0 after:start-4 after:w-px after:-translate-x-[0.5px] after:bg-neutral-800">
                            <div class="relative z-10 size-8 flex justify-center items-center">
                              <span class="flex shrink-0 justify-center items-center size-8 border border-neutral-800 text-[#ff0] font-semibold text-xs uppercase rounded-full">
                                3
                              </span>
                            </div>
                        </div>
                        <!-- End Icon -->

                        <!-- Right Content -->
                        <div class="grow pt-0.5 pb-8 sm:pb-12">
                            <p class="text-sm md:text-base text-neutral-400">
                                <span class="text-white">Trade and Invest</span>
                                With your wallet balance your can trade the digital market, invest in assets, join a trading plan or stake for percentage returns
                            </p>
                        </div>
                        <!-- End Right Content -->
                    </div>
                    <!-- End Item -->

                    <x-ui.secondary-button href="{{route('register')}}">
                        Get started now
                    </x-ui.secondary-button>
                </div>
                <!-- End Timeline -->
            </div>
            <!-- End Grid -->
        </div>
    </section>
    <!-- End Approach -->
</x-page-layout>
