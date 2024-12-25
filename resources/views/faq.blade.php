<x-page-layout>
    <section class="max-w-4xl py-12 mx-auto">
        <h1 class="mb-10 font-semibold text-gray-800 text-4xl  dark:text-neutral-200">FAQs</h1>

        <div class="mb-10 grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="space-y-4">
                <h2 class="font-medium dark:text-neutral-200">Can I trade crypto and forex in addition to stocks?</h2>
                <p>Yes, our platform offers multi-asset trading, so you can trade stocks, crypto, and forex from the same account. You have access to a wide variety of markets and can diversify your portfolio by investing in different asset classes.</p>
            </div>
            <div class="space-y-4">
                <h2 class="font-medium dark:text-neutral-200"> Is it safe to trade with your platform?</h2>
                <p>Yes, your safety is our top priority. We use advanced encryption protocols to protect your personal and financial data. Our platform complies with industry standards and regulatory requirements to ensure a secure trading environment.</p>
            </div>
            <div class="space-y-4">
                <h2 class="font-medium dark:text-neutral-200">What is copy trading, and how does it work?</h2>
                <p>Copy trading allows you to automatically replicate the trades of experienced traders. Simply choose a trader from our list of professionals, and our system will mirror their trades in your account. It's a great way to benefit from expert strategies without needing in-depth market knowledge.</p>
            </div>
            <div class="space-y-4">
                <h2 class="font-medium dark:text-neutral-200"> Can I stake my cryptocurrency on your platform?</h2>
                <p>Yes! We offer staking services for popular cryptocurrencies. By staking your assets, you can earn passive rewards while contributing to the security and efficiency of blockchain networks. It’s an easy way to grow your crypto holdings.</p>
            </div>
            <div class="space-y-4">
                <h2 class="font-medium dark:text-neutral-200">How do I open an account and start trading?</h2>
                <p>Opening an account is easy. Simply click on the "Sign Up" button, complete the registration form, and verify your identity. Once your account is approved, you can deposit funds and begin trading.</p>
            </div>
            <div class="space-y-4">
                <h2 class="font-medium dark:text-neutral-200">Do you provide customer support?</h2>
                <p>Yes, our customer support team is available 24/5 via live chat, email, and phone to assist you with any issues or inquiries.</p>
            </div>
        </div>
        <div class="p-10 rounded-lg flex flex-col lg:flex-row items-center justify-between gap-5 bg-[#ff0] dark:text-gray-800">
            <h3 class="text-2xl font-bold">Trade smarter with our team and start your journey today!</h3>
            <div class="flex items-center gap-5">
                <a href="{{route('page', ['page' => 'about'])}}" class="font-bold text-nowrap bg-white rounded-md shadow px-6 py-3">
                    Learn more
                </a>
                <a href="{{route('register')}}" class="font-bold text-nowrap bg-white/55 rounded-md shadow px-6 py-3">
                    Get Started
                </a>
            </div>
        </div>
    </section>
</x-page-layout>