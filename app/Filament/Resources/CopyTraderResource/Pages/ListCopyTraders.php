<?php

namespace App\Filament\Resources\CopyTraderResource\Pages;

use App\Filament\Resources\CopyTraderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCopyTraders extends ListRecords
{
    protected static string $resource = CopyTraderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
