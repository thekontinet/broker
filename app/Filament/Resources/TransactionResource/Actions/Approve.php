<?php

namespace App\Filament\Resources\TransactionResource\Actions;

use App\Models\Transaction;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Tables\Actions\Action;

class Approve extends Action
{
    use CanCustomizeProcess;

    protected ?Closure $mutateRecordDataUsing = null;

    public static function getDefaultName(): ?string
    {
        return 'approve';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Approve');
        $this->icon('heroicon-o-check');
        $this->hidden(fn ($record) => $record->confirmed);

        $this->action(function (Transaction $record) {
            $record->wallet->confirm($record);
        });
    }
}
