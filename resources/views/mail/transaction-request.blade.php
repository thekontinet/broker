<x-mail::message>
# {{ucfirst($transaction->type)}} Request

{{$transaction->wallet->holder->name}}, made a {{$transaction->type}} request. Login your admin dashboard to confirm this transaction.

<x-mail::button :url="route('login')">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
