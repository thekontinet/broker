<?php

namespace App\Filament\Resources\WalletResource\Actions;

use App\Models\Wallet;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\Action;

class FundWallet extends Action
{
    use CanCustomizeProcess;

    protected ?Closure $mutateRecordDataUsing = null;

    public static function getDefaultName(): ?string
    {
        return 'Fund Wallet';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->form([
            TextInput::make('amount')->numeric()->required(),
            Select::make('type')->options(['credit' => 'credit', 'debit' => 'debit'])->required(),
            Checkbox::make('status')->label('Confirm immediately')
                ->helperText('If you select this, the fund will reflect on the user balance immediately, otherwise it will be a pending transaction'),
        ])->action(function(array $data, Wallet $record) {
            if($data['type'] === 'credit'){
                $record->depositFloat(abs($data['amount']), confirmed: $data['status']);
            }else{
                $record->withdrawFloat(abs($data['amount']), confirmed: $data['status']);
            }
        });
    }
}
