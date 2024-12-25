<x-page-layout>
    <section class="mx-auto max-w-4xl py-12">
        <div class="mb-20 space-y-3 font-bold text-neutral-200">
            <h1>Forex Trading</h1>
            <p class="text-4xl font-medium">Trade foreign exchange on our platform
            </p>
        </div>

        <p class="mb-10">Forex is short for foreign exchange. The forex market is a place where currencies are traded. It is the largest and most liquid financial market in the world with an average daily turnover of 6.6 trillion U.S. dollars as of 2019. The basis of the forex market is the fluctuations of exchange rates. Forex traders speculate on the price fluctuations of currency pairs, making money on the difference between buying and selling prices.</p>

        <div class="space-y-4 mb-10">
            <h2 class="font-bold dark:text-neutral-200 text-2xl">What is Margin?</h2>
            <p>Margin is the amount of a trader’s funds required to open a new position. Margin is estimated based on the size of your trade, which is measured in lots. A standard lot is 100,000 units. We also provide mini lots (10,000 units), micro lots (1,000 units) and nano lots (100 units). The greater the lot, the bigger the margin amount. Margin allows you to trade with leverage, which, in turn, allows you to place trades larger than the amount of your trading capital. Leverage influences the margin amount too.</p>
        </div>

        <div class="space-y-4 mb-10">
            <h2 class="font-bold dark:text-neutral-200 text-2xl">What is leverage?</h2>
            <p>Leverage is the ability to trade positions larger than the amount of capital you possess. This mechanism allows traders to use extra funds from a broker in order to increase the size of their trades. For example, 1:100 leverage means that a trader who has deposited $1,000 into his or her account can trade with $100,000. Although leverage lets traders increase their trade size and, consequently, potential gains, it magnifies their potential losses putting their capital at risk.</p>
        </div>
        <div class="space-y-4 mb-10">
            <h2 class="font-bold dark:text-neutral-200 text-2xl">When is the forex market open? </h2>
            <p>Due to different time zones, the international forex market is open 24 hours a day — from 5 p.m. Eastern Standard Time (EST) on Sunday to 4 p.m. EST on Friday, except holidays. Markets first open in Australasia, then in Europe and afterwards in North America. So, when the market closes in Australia, traders can have access to markets in other regions. The 24-hour availability of the forex market is what makes it so attractive to millions of traders.</p>
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