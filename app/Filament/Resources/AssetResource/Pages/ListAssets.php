<?php

namespace App\Filament\Resources\AssetResource\Pages;

use App\Enums\AssetTypeEnum;
use App\Filament\Resources\AssetResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListAssets extends ListRecords
{
    protected static string $resource = AssetResource::class;

    public function getTabs(): array
    {
        $tabs = [
        ];
        foreach (AssetTypeEnum::cases() as $case) {
            $tabs[$case->name] = Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', $case));
        }
        return $tabs;
    }

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
