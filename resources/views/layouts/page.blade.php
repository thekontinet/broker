<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50 w-full overflow-x-hidden">
<!-- ========== HEADER ========== -->
<header class="sticky top-4 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full before:absolute before:inset-0 before:max-w-[66rem] before:mx-2 before:lg:mx-auto before:rounded-[26px] before:bg-neutral-800/30 before:backdrop-blur-md">
    <nav class="relative max-w-[66rem] w-full py-2.5 ps-5 pe-2 md:flex md:items-center md:justify-between md:py-0 mx-2 lg:mx-auto">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <x-application-logo />
            <!-- End Logo -->

            <div class="md:hidden">
                <button type="button" class="hs-collapse-toggle size-8 flex justify-center items-center text-sm font-semibold rounded-full bg-neutral-800 text-white disabled:opacity-50 disabled:pointer-events-none" id="hs-navbar-floating-dark-collapse" aria-expanded="false" aria-controls="hs-navbar-floating-dark" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-floating-dark">
                    <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                    <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Collapse -->
        <div id="hs-navbar-floating-dark" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-navbar-floating-dark-collapse">
            <div class="flex flex-col md:flex-row md:items-center md:justify-end py-2 md:py-0 md:ps-7">
                <a class="p-3 ps-px sm:px-3 md:py-4 text-sm text-white hover:text-neutral-300 focus:outline-none focus:text-neutral-300" href="/" aria-current="page">Home</a>
                <a class="p-3 ps-px sm:px-3 md:py-4 text-sm text-white hover:text-neutral-300 focus:outline-none focus:text-neutral-300" href="{{route('markets.index', 'crypto')}}">Markets</a>
                <a class="p-3 ps-px sm:px-3 md:py-4 text-sm text-white hover:text-neutral-300 focus:outline-none focus:text-neutral-300" href="{{ route('wallets.index') }}">Wallets</a>
                <a class="p-3 ps-px sm:px-3 md:py-4 text-sm text-white hover:text-neutral-300 focus:outline-none focus:text-neutral-300" href="{{ route('profile.edit') }}">Profile</a>

                <div>
                    <a class="group inline-flex items-center gap-x-2 py-2 px-3 bg-[#ff0] font-medium text-sm text-neutral-800 rounded-full focus:outline-none" href="{{ route('register') }}">
                        Create New Account
                    </a>
                </div>
            </div>
        </div>
        <!-- End Collapse -->
    </nav>
</header>
<!-- ========== END HEADER ========== -->

<main>
    {{$slot}}
</main>

<!-- ========== FOOTER ========== -->
<footer class="relative overflow-hidden bg-neutral-900">
    <svg class="absolute -bottom-20 start-1/2 w-[1900px] transform -translate-x-1/2" width="2745" height="488" viewBox="0 0 2745 488" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.5 330.864C232.505 403.801 853.749 527.683 1482.69 439.719C2111.63 351.756 2585.54 434.588 2743.87 487" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 308.873C232.505 381.81 853.749 505.692 1482.69 417.728C2111.63 329.765 2585.54 412.597 2743.87 465.009" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 286.882C232.505 359.819 853.749 483.701 1482.69 395.738C2111.63 307.774 2585.54 390.606 2743.87 443.018" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 264.891C232.505 337.828 853.749 461.71 1482.69 373.747C2111.63 285.783 2585.54 368.615 2743.87 421.027" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 242.9C232.505 315.837 853.749 439.719 1482.69 351.756C2111.63 263.792 2585.54 346.624 2743.87 399.036" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 220.909C232.505 293.846 853.749 417.728 1482.69 329.765C2111.63 241.801 2585.54 324.633 2743.87 377.045" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 198.918C232.505 271.855 853.749 395.737 1482.69 307.774C2111.63 219.81 2585.54 302.642 2743.87 355.054" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 176.927C232.505 249.864 853.749 373.746 1482.69 285.783C2111.63 197.819 2585.54 280.651 2743.87 333.063" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 154.937C232.505 227.873 853.749 351.756 1482.69 263.792C2111.63 175.828 2585.54 258.661 2743.87 311.072" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 132.946C232.505 205.882 853.749 329.765 1482.69 241.801C2111.63 153.837 2585.54 236.67 2743.87 289.082" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 110.955C232.505 183.891 853.749 307.774 1482.69 219.81C2111.63 131.846 2585.54 214.679 2743.87 267.091" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 88.9639C232.505 161.901 853.749 285.783 1482.69 197.819C2111.63 109.855 2585.54 192.688 2743.87 245.1" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 66.9729C232.505 139.91 853.749 263.792 1482.69 175.828C2111.63 87.8643 2585.54 170.697 2743.87 223.109" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 44.9819C232.505 117.919 853.749 241.801 1482.69 153.837C2111.63 65.8733 2585.54 148.706 2743.87 201.118" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 22.991C232.505 95.9276 853.749 219.81 1482.69 131.846C2111.63 43.8824 2585.54 126.715 2743.87 179.127" class="stroke-neutral-700/50" stroke="currentColor"/>
        <path d="M0.5 1C232.505 73.9367 853.749 197.819 1482.69 109.855C2111.63 21.8914 2585.54 104.724 2743.87 157.136" class="stroke-neutral-700/50" stroke="currentColor"/>
    </svg>

    <div class="relative z-10">
        <div class="w-full max-w-5xl px-4 xl:px-0 py-10 lg:pt-16 mx-auto">
            <div class="inline-flex items-center">
                <!-- Logo -->
                <div>
                    <x-application-logo/>
                    <p class="text-xs">
                        Our exchange uses charting technology provided by TradingView, a global platform where you can watch cryptocurrency prices, analyze market movements, and prepare for trades with the latest news and insights from fellow traders. watch cryptocurrency prices analyze market movements, and prepare for trades with the latest news and insights from fellow traders.
                    </p>
                </div>
                <!-- End Logo -->

                <div class="border-s border-neutral-700 ps-5 ms-5">
                    <p class="text-sm text-neutral-400">
                        © {{date('Y')}} {{config('app.name')}}.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ========== END FOOTER ========== -->

<div id="cookies-simple-with-icon-and-dismiss-button" class="fixed bottom-0 end-0 z-[60] sm:max-w-sm w-full mx-auto p-6">
    <!-- Card -->
    <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-800">
        <div class="flex gap-x-4">
            <svg class="shrink-0 w-8 h-auto" width="72" height="63" viewBox="0 0 72 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.5174 56.1528C16.2903 57.6825 16.929 61.4559 14.8118 60.9459C13.5013 60.5381 11.4445 57.6213 12.493 56.1528C12.661 55.8468 13.2189 55.2757 14.106 55.4389" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
                <path d="M15.5173 49.6263L14.0262 48.5579C13.5346 48.2056 12.8477 48.3707 12.658 48.945C12.3456 49.8907 12.1258 51.1463 12.462 52.2324C12.5336 52.4636 12.7127 52.6466 12.9449 52.7146C13.8342 52.9751 15.2568 52.9048 15.8197 51.054" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
                <mask id="path-3-inside-1_4542_101166" fill="currentColor" class="text-gray-800 dark:fill-neutral-200">
                    <ellipse rx="1.09811" ry="0.738034" transform="matrix(0.921654 0.388014 -0.38048 0.924789 14.2069 43.4055)"/>
                </mask>
                <path d="M13.3756 43.0555C13.6288 42.4402 14.1378 42.259 14.3273 42.2214C14.5316 42.1809 14.6503 42.223 14.687 42.2384L13.1651 45.9376C13.7607 46.1884 14.4484 46.2907 15.1206 46.1574C15.7781 46.0269 16.654 45.5999 17.0622 44.6076L13.3756 43.0555ZM14.687 42.2384C14.7237 42.2539 14.8369 42.3094 14.9524 42.4846C15.0596 42.6471 15.2913 43.1401 15.0381 43.7554L11.3515 42.2034C10.9432 43.1957 11.261 44.1253 11.6329 44.689C12.0131 45.2654 12.5694 45.6868 13.1651 45.9376L14.687 42.2384ZM15.0381 43.7554C14.7849 44.3708 14.2759 44.552 14.0864 44.5895C13.8821 44.6301 13.7634 44.588 13.7267 44.5725L15.2486 40.8734C14.653 40.6226 13.9653 40.5203 13.2931 40.6536C12.6357 40.784 11.7597 41.2111 11.3515 42.2034L15.0381 43.7554ZM13.7267 44.5725C13.69 44.5571 13.5768 44.5015 13.4613 44.3264C13.3541 44.1638 13.1225 43.6709 13.3756 43.0555L17.0622 44.6076C17.4705 43.6153 17.1527 42.6857 16.7809 42.1219C16.4007 41.5455 15.8443 41.1241 15.2486 40.8734L13.7267 44.5725Z" fill="black" mask="url(#path-3-inside-1_4542_101166)"/>
                <mask id="path-5-inside-2_4542_101166" fill="currentColor" class="text-gray-800 dark:fill-neutral-200">
                    <ellipse rx="1.00988" ry="1.0181" transform="matrix(0.921654 0.388014 -0.38048 0.924789 21.3702 57.2201)"/>
                </mask>
                <path d="M20.4576 56.8359C20.6581 56.3486 21.2257 56.094 21.7438 56.312L20.2219 60.0112C21.768 60.6621 23.5159 59.9153 24.1442 58.388L20.4576 56.8359ZM21.7438 56.312C22.2618 56.5301 22.4832 57.1169 22.2827 57.6043L18.5961 56.0522C17.9677 57.5795 18.6757 59.3603 20.2219 60.0112L21.7438 56.312ZM22.2827 57.6043C22.0822 58.0916 21.5146 58.3462 20.9966 58.1281L22.5185 54.429C20.9724 53.7781 19.2245 54.5249 18.5961 56.0522L22.2827 57.6043ZM20.9966 58.1281C20.4785 57.9101 20.2571 57.3233 20.4576 56.8359L24.1442 58.388C24.7726 56.8607 24.0646 55.0799 22.5185 54.429L20.9966 58.1281Z" fill="black" mask="url(#path-5-inside-2_4542_101166)"/>
                <mask id="path-7-inside-3_4542_101166" fill="currentColor" class="text-gray-800 dark:fill-neutral-200">
                    <ellipse rx="1.00988" ry="1.0181" transform="matrix(0.921654 0.388014 -0.38048 0.924789 6.75397 38.8236)"/>
                </mask>
                <path d="M5.84142 38.4394C6.04192 37.9521 6.60952 37.6975 7.12756 37.9156L5.60564 41.6147C7.15177 42.2656 8.89966 41.5188 9.52804 39.9915L5.84142 38.4394ZM7.12756 37.9156C7.6456 38.1337 7.86701 38.7205 7.66651 39.2078L3.9799 37.6557C3.35152 39.1831 4.05951 40.9638 5.60564 41.6147L7.12756 37.9156ZM7.66651 39.2078C7.46601 39.6951 6.89842 39.9498 6.38037 39.7317L7.90229 36.0325C6.35616 35.3816 4.60827 36.1284 3.9799 37.6557L7.66651 39.2078ZM6.38037 39.7317C5.86233 39.5136 5.64092 38.9268 5.84142 38.4394L9.52804 39.9915C10.1564 38.4642 9.44843 36.6834 7.90229 36.0325L6.38037 39.7317Z" fill="black" mask="url(#path-7-inside-3_4542_101166)"/>
                <path d="M31.6479 50.2383C31.5807 51.2241 32.1721 53.053 35.0756 52.4819" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
                <path d="M50.9903 34.6769C50.1699 34.1428 48.3973 33.5907 47.8709 35.6552" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
                <path d="M40.9087 17.4562C40.0882 16.9221 38.3156 16.37 37.7892 18.4345" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
                <path d="M27.8502 29.3345C27.1279 29.998 26.1419 31.587 27.977 32.6357" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
                <path d="M62.1917 19.585C62.4894 18.6451 62.5577 16.7703 60.4502 16.7902" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
                <ellipse cx="51.2061" cy="22.3973" rx="3.02446" ry="3.05945" fill="currentColor" class="text-gray-800 dark:fill-neutral-200"/>
                <path d="M67.7398 29.6361C68.8249 31.2826 67.6381 32.6215 66.8281 33.1457C66.7645 33.1869 66.695 33.2184 66.6214 33.2363C65.0504 33.618 63.6063 31.5388 63.6063 30.0441C63.6064 28.8034 66.3283 27.4945 67.7398 29.6361Z" fill="currentColor" class="text-gray-800 dark:fill-neutral-200"/>
                <path d="M58.868 38.6126C57.9809 36.4914 54.6002 37.7288 53.0207 38.6126C51.7101 39.2284 52.0126 41.4681 53.6256 43.3038C54.9161 44.7723 56.5157 44.1196 57.1542 43.6097C58.0951 42.8279 59.7552 40.7339 58.868 38.6126Z" fill="currentColor" class="text-gray-800 dark:fill-neutral-200"/>
                <path d="M5.85665 41.8048C5.21042 40.2694 2.74791 41.1651 1.59743 41.8048C0.642774 42.2505 0.863078 43.8717 2.03804 45.2004C2.978 46.2634 4.14317 45.7909 4.60826 45.4219C5.29365 44.8559 6.50288 43.3402 5.85665 41.8048Z" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
                <path d="M45.4596 49.2172C40.9431 47.667 40.2844 51.6987 40.5196 53.9083C40.8221 55.3361 42.4351 55.54 43.4433 55.2341C45.5677 54.5894 51.1052 51.1548 45.4596 49.2172Z" fill="currentColor" class="text-gray-800 dark:fill-neutral-200"/>
                <ellipse rx="2.96295" ry="3.45694" transform="matrix(0.855131 0.518411 -0.509711 0.860345 30.4996 41.3871)" fill="currentColor" class="text-gray-800 dark:fill-neutral-200"/>
                <path d="M38.5032 29.1282C39.471 27.8228 37.8983 26.0687 36.991 25.3549C36.0836 24.6411 34.8335 24.8654 33.8657 26.1707C32.7567 27.6664 37.2934 30.7599 38.5032 29.1282Z" fill="currentColor" class="text-gray-800 dark:fill-neutral-200"/>
                <path d="M19.2476 18.9295C16.4247 18.2768 15.7862 19.8813 15.8198 20.7652C16.0215 23.8246 20.5582 24.4365 21.6672 23.6207C22.4364 23.0548 22.7761 19.7453 19.2476 18.9295Z" fill="currentColor" class="text-gray-800 dark:fill-neutral-200"/>
                <path d="M36.6888 6.79381C35.6403 4.67259 33.2947 5.02613 32.2529 5.46805C28.7042 6.61025 29.3292 8.52749 30.1358 9.13938C31.3456 10.1252 34.2289 12.0153 36.0839 11.6889C38.4027 11.281 37.9994 9.44533 36.6888 6.79381Z" fill="currentColor" class="text-gray-800 dark:fill-neutral-200"/>
                <path d="M56.9526 54.9284C57.7592 53.5006 60.2795 51.0735 65.1187 49.9313C66.0596 49.7953 67.9818 48.5647 68.1431 44.7302C68.3448 39.9371 73.5872 32.9003 69.3529 28.1072C67.5382 26.053 68.4456 23.2121 67.5382 17.7051" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
                <path d="M66.7316 16.176C65.1521 14.2383 60.6625 9.8939 55.3394 8.01743C48.703 5.67797 55.8063 4.55591 44.1399 4.75246C44.0816 4.75344 44.0194 4.76029 43.9617 4.76836C43.019 4.90008 40.5102 4.51266 37.2614 1.95295C37.2161 1.91728 37.1681 1.88406 37.1153 1.86091C36.6 1.63502 35.1744 1.43154 32.9584 2.2045C30.6195 3.02036 24.0531 5.46791 21.0622 6.58971C20.4237 6.92965 19.0056 8.05825 18.441 9.85312C17.7353 12.0967 5.93991 23.5187 9.56927 28.9237" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
                <path d="M10.4768 30.1484C11.9084 30.3333 14.621 31.3895 15.0562 34.1372C15.1369 34.6464 15.5068 35.0847 16.0079 35.2063C18.8253 35.8904 22.6446 38.4014 20.8122 44.4603C20.7218 44.7592 20.7652 45.0847 20.9158 45.3583C21.7327 46.8422 22.367 49.4462 20.6725 51.7386C20.1262 52.4776 20.4167 53.842 21.2912 54.1243C23.3727 54.7962 25.8398 55.985 27.2662 57.833C27.5533 58.2049 28.0338 58.3932 28.4956 58.3062C30.4142 57.9446 33.9492 57.9776 37.2937 60.233C42.1328 63.4964 42.3345 60.0291 48.6858 60.7429C53.7669 61.314 55.7765 58.3294 56.1462 56.7656" stroke="currentColor" class="dark:stroke-neutral-200" stroke-width="2" stroke-linecap="round"/>
            </svg>

            <div class="grow">
                <p class="text-sm text-gray-800 dark:text-neutral-200">
                    By browsing this website, you accept our <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500" href="#">Cookies Policy</a>
                </p>
            </div>

            <div>
                <button type="button" class="p-2 inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-remove-element="#cookies-simple-with-icon-and-dismiss-button">
                    <span class="sr-only">Dismiss</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                </button>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
</body>
</html>
