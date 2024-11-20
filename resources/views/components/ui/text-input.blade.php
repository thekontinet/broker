@props(['disabled' => false, 'label' => null])

@php
$id = \Illuminate\Support\Str::uuid();
@endphp

<div>
    <label for="{{$id}}" class="block text-sm mb-2 dark:text-white">{{$label}}</label>
    <input id="{{$id}}" {{$attributes->merge(['class' => "py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"])}}  @disabled($disabled)>
    @if ($error = $errors->get($attributes->get('name')))
        <ul class="text-sm text-red-600 dark:text-red-400 space-y-1">
            @foreach ((array) $error as $message)
                <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
            @endforeach
        </ul>
    @endif
</div>
