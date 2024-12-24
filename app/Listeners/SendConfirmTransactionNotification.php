<?php

namespace App\Listeners;

use App\Mail\TransactionConfirmed;
use App\Models\User;
use App\Models\Wallet;
use Bavix\Wallet\Internal\Events\BalanceUpdatedEvent;
use Illuminate\Support\Facades\Mail;

class SendConfirmTransactionNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BalanceUpdatedEvent $event): void
    {
        $wallet = Wallet::query()->find($event->getWalletId());
        if ($wallet->holder instanceof User) {
            Mail::to($wallet->holder)->send(new TransactionConfirmed($wallet));
        }
    }
}
