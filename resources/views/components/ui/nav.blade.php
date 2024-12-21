<nav {{$attributes->class(["hs-accordion-group p-3 w-full flex flex-col flex-wrap"])}} data-hs-accordion-always-open>
    <ul class="flex flex-col space-y-1">
        {{ $slot }}
    </ul>
</nav>
