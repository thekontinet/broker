@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 focus:outline-none focus:bg-gray-100 dark:bg-neutral-700 dark:text-white'
            : 'w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-300';
@endphp
<li>
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
</li>
