@props([
    'value',
    'label' => null,
    'size' => 'lg',
    'color' => 'success',
])
<!-- Gauge Component -->
<div @class(['relative',
    'size-40' => $size === 'lg',
    'size-24' => $size === 'md',
    'size-14' => $size === 'sm'
])>
    <svg class="rotate-[135deg] size-full" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
        <!-- Background Circle (Gauge) -->
        <circle cx="18" cy="18" r="16" fill="none" stroke-width="1" stroke-dasharray="75 100" stroke-linecap="round"
            @class([
               "stroke-current dark:text-neutral-700",
               'text-green-200' => $color === 'success',
               'text-red-200' => $color === 'danger',
               'text-amber-200' => $color === 'warning',
               'text-gray-200' => $color === 'secondary'
            ])
        ></circle>

        <!-- Gauge Progress -->
        <circle cx="18" cy="18" r="16" fill="none" stroke-width="2" stroke-dasharray="{{$value/100 * 75}} 100" stroke-linecap="round" @class([
            "stroke-current",
            'text-green-500 dark:text-green-500' => $color === 'success',
            'text-red-500 dark:text-t-red-500' => $color === 'danger',
            'text-amber-500 dark:text-amber-500' => $color === 'warning',
            'text-gray-500 dark:text--gray-500' => $color === 'secondary'
        ])>
        </circle>
    </svg>

    <!-- Value Text -->
    <div class="absolute top-1/2 start-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
        <span @class([
                "font-bold",
                'text-green-500 dark:text-green-500' => $color === 'success',
                'text-red-500 dark:text-t-red-500' => $color === 'danger',
                'text-amber-500 dark:text-amber-500' => $color === 'warning',
                'text-gray-500 dark:text--gray-500' => $color === 'secondary',
                "text-4xl" => $size === 'lg',
                "text-2xl" => $size === 'md',
                "text-sm" => $size === 'sm',
              ])>{{$value}}</span>
        <span @class([
                "block",
                'text-green-500 dark:text-green-500' => $color === 'success',
                'text-red-500 dark:text-t-red-500' => $color === 'danger',
                'text-amber-500 dark:text-amber-500' => $color === 'warning',
                'text-gray-500 dark:text--gray-500' => $color === 'secondary',
                "text-base" => $size === 'lg',
                "text-xs" => $size === 'md',
                "text-[.5rem]" => $size === 'sm',
])>{{$label}}</span>
    </div>
</div>
<!-- End Gauge Component -->
