@props(['disabled' => false, 'label' => null])

@php
    $id = \Illuminate\Support\Str::uuid();
@endphp

<div>
    <div class="flex items-center">
        <input type="checkbox" id="{{$id}}" {{$attributes->merge(['class' => "shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"])}}  @disabled($disabled)>
        <label for="{{$id}}" class="text-sm text-gray-500 ms-2 dark:text-neutral-400">{{$label}}</label>
    </div>
    @if ($error = $errors->get($attributes->get('name')))
        <ul class="text-sm text-red-600 dark:text-red-400 space-y-1">
            @foreach ((array) $error as $message)
                <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
            @endforeach
        </ul>
    @endif
</div>
