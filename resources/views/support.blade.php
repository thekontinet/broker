<x-page-layout>
    <header class="max-w-4xl px-4 pt-10 sm:px-6 lg:px-8 mx-auto text-sm  space-y-2 mt-4"">
        <h1 class="text-white font-bold text-lg">Support</h1>
        <p class="text-sm">How can we help you ?</p>
    </header>

    <section class="max-w-4xl px-4 pb-10 sm:px-6 lg:px-8 mx-auto text-sm  mt-4 space-y-5">
        @if($message= session('success'))
        <div class="mt-2 bg-teal-500 text-sm text-white rounded-lg p-4" role="alert" tabindex="-1" aria-labelledby="hs-solid-color-success-label">
            <span id="hs-solid-color-success-label" class="font-bold">Success:</span> {{ $message }}
          </div>
        @endif
        <x-ui.form class="space-y-4" method="post" action="{{ route('support.email') }}">
            <x-ui.text-input label="Full Name" name="name"/>
            <x-ui.text-input label="Email Address" name="email"/>
            <x-ui.text-area rows="6" label="Message" name="message"/>
            <x-ui.primary-button>Send</x-ui.primary-button>
        </x-ui.form>
    </section>
</x-page-layout>