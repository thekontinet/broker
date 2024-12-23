<?php

namespace App\Listeners;

use App\Mail\NewTransactionRequest;
use App\Models\Transaction;
use App\Models\User;
use Bavix\Wallet\Internal\Events\TransactionCreatedEvent;
use Illuminate\Support\Facades\Mail;

class EmailAdminOnNewTranactionRequest
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
    public function handle(TransactionCreatedEvent $event): void
    {
        $transaction = Transaction::query()->find($event->getId());

        if (! $transaction->confirmed) {
            Mail::to(User::query()->admins()->get())->send(new NewTransactionRequest($transaction));
        }
    }
}
