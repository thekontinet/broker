<?php

namespace App\Filament\Resources\WalletResource\Pages;

use App\Filament\Resources\WalletResource;
use App\Models\Asset;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateWallet extends CreateRecord
{
    protected static string $resource = WalletResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = $data['holder_type']::find($data['holder_id']);
        if($wallet = $user->getWallet($data['slug'])){
            Notification::make()
                ->title('Error creating wallet')
                ->body("This user already own a $wallet->slug wallet")
                ->danger()
                ->send();
            $this->halt();
        }
        $asset = Asset::query()->where('symbol', $data['slug'])->first();
        $data['name'] = $asset->name;
        $data['decimal_places'] = $asset->precision;
        $data['meta'] = ['currency' => $asset->symbol];

        return $data;
    }
}
