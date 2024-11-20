@props(['method' => 'get'])
@php
$method = strtolower($method);
$hasUnsupportedMethod = $method !==  'get' && $method !==  'post';
@endphp

<form {{$attributes->merge(['method' => $hasUnsupportedMethod ? 'post' : $method])}}>
    @if($method !==  'get')
        @csrf
    @endif

    @if($hasUnsupportedMethod)
        @method($method)
    @endif

    {{$slot}}
</form>
