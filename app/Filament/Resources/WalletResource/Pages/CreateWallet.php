<?php

namespace App\Filament\Resources\WalletResource\Pages;

use App\Filament\Resources\WalletResource;
use App\Models\Asset;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWallet extends CreateRecord
{
    protected static string $resource = WalletResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $asset = Asset::query()->where('symbol', $data['slug'])->first();
        $data['name'] = $asset->name;
        $data['decimal_places'] = $asset->precision;
        $data['meta'] = ['currency' => $asset->symbol];

        return $data;
    }
}
