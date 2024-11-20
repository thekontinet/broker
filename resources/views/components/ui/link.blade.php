@props(['href'])
<a {{$attributes->merge(['href' => $href, 'class' => "text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"])}}>
    {{$slot}}
</a>
