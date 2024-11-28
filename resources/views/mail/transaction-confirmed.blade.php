<x-mail::message>
# Transaction Alert

A new transaction has been recorded on your **{{ strtoupper($wallet->currency) }}** account.

Your updated balance is: **{{ money($wallet->balanceFloat, $wallet->currency) }}**.

To review the transaction details, please click the button below:

<x-mail::button :url="route('wallets.show', $wallet)">
    View Transaction
</x-mail::button>

Thank you for choosing {{ config('app.name') }}.

Best regards,
The {{ config('app.name') }} Team
</x-mail::message>

