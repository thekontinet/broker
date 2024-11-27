<x-page-layout>
    <section class="relative bg-gradient-to-bl from-blue-100 via-transparent dark:from-blue-950 dark:via-transparent" x-init="
        Gsap.fromTo('.slide-in-left', {xPercent: -150, opacity:0}, {xPercent:0, opacity: 1,  duration:1.5, stagger: 0.7})
        Gsap.fromTo('.slide-in-right', {xPercent: 150, opacity:0}, {xPercent:0, opacity: 1,  duration:1.5, stagger: 0.7})
    ">
        <div class="mt-4 max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <h1 class="slide-in-left mb-4 font-semibold text-gray-800 text-4xl lg:text-5xl dark:text-neutral-200">
                About Us
            </h1>
            <p class="slide-in-left text-gray-600 dark:text-neutral-400">
                Welcome to {{ config('app.name') }}—your trusted partner in navigating the dynamic world of crypto, stocks, and forex trading. With a foundation built on expertise and innovation, we are committed to delivering seamless, intelligent solutions that empower traders and investors across the globe. At {{ config('app.name') }}, we combine years of industry experience with cutting-edge technology to redefine financial success. Whether you're an experienced trader or taking your first steps into the markets, we provide the tools, resources, and support you need to achieve your goals with confidence.
            </p>
        </div>
    </section>

    <section class="max-w-[85rem] px-4 py-5 sm:px-6 lg:px-8 mx-auto">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-12">
            <div class="lg:w-3/4">
                <h2 class="text-3xl text-gray-800 font-bold lg:text-4xl dark:text-white">
                    Our Commitment to You
                </h2>
                <p class="mt-3 text-gray-800 dark:text-neutral-400">
                    we are dedicated to empowering traders and investors with the tools and resources they need to thrive. Here’s how we ensure your success.
                </p>
            </div>
            <!-- End Col -->

            <div class="space-y-6 lg:space-y-10" x-init="
                    Gsap.fromTo('slide-in-right', {xPercent: 150, duration: 2, stagger: 1})
            ">
                <!-- Icon Block -->
                <div class="flex gap-x-5 sm:gap-x-8 icon-block">
                    <!-- Icon -->
                    <span class="shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm mx-auto dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200">
                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                        </svg>
                    </span>
                    <div class="grow">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Accessibility Made Easy
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-neutral-400">
                            We simplify trading and investing, making it approachable for beginners and efficient for seasoned professionals.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="flex gap-x-5 sm:gap-x-8 icon-block">
                    <!-- Icon -->
                    <span class="shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm mx-auto dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                        </svg>
                    </span>
                    <div class="grow">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Secure Trading Environment
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-neutral-400">
                            Your safety is our priority. We use advanced encryption and secure protocols to protect your investments and data.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="flex gap-x-5 sm:gap-x-8 icon-block">
                    <!-- Icon -->
                    <span class="shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm mx-auto dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                    </span>
                    <div class="grow">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Rewarding Opportunities
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-neutral-400">
                            Gain access to a wealth of diverse markets and assets designed to maximize your potential for growth.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div class="flex gap-x-5 sm:gap-x-8 icon-block">
                    <!-- Icon -->
                    <span class="shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm mx-auto dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200">
                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 10v12" />
                            <path d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z" />
                        </svg>
                    </span>
                    <div class="grow">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Informed Decisions
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-neutral-400">
                            Rely on our actionable insights and expert analysis to stay ahead in the financial landscape.
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </section>

    <section class="relative bg-gradient-to-bl from-blue-100 via-transparent dark:from-blue-950 dark:via-transparent" x-init="
        Gsap.fromTo('.slide-in-left', {xPercent: -150, opacity:0}, {xPercent:0, opacity: 1,  duration:1.5, stagger: 0.7})
        Gsap.fromTo('.slide-in-right', {xPercent: 150, opacity:0}, {xPercent:0, opacity: 1,  duration:1.5, stagger: 0.7})
    ">
        <div class="mt-4 max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <h1 class="slide-in-left mb-4 text-center font-semibold text-gray-800 text-4xl lg:text-5xl dark:text-neutral-200">
                Our Vision
            </h1>
            <p class="slide-in-left text-gray-600 dark:text-neutral-400">
                We aim to set new standards in the financial trading industry, creating a bridge between opportunity and achievement for all our clients. Through innovation, integrity, and a relentless focus on excellence, we’re shaping the future of trading and investment.

                Step into a world where your ambitions are met with expertise and your potential knows no bounds. {{config('app.name')}} is here to guide you at every turn—because when you succeed, we succeed.

                Let’s grow together. Start your journey with {{config('app.name')}} today.
            </p>
        </div>
    </section>
</x-page-layout>