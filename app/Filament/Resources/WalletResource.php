<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WalletResource\Actions\FundWallet;
use App\Filament\Resources\WalletResource\Pages;
use App\Models\User;
use App\Models\Wallet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class WalletResource extends Resource
{
    protected static ?string $model = Wallet::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    protected static ?string $navigationGroup = 'Wallets';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\MorphToSelect::make('holder')
                    ->types([
                        Forms\Components\MorphToSelect\Type::make(User::class)
                            ->titleAttribute('name'),
                    ])
                    ->required(),
                Forms\Components\Select::make('slug')
                    ->relationship('asset', 'name', fn (Builder $query) => $query->active()->whereIn('symbol', array_keys(config('money.currencies'))))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->modifyQueryUsing(fn ($query) => $query->where('holder_type', User::class))->columns([
            Tables\Columns\TextColumn::make('holder.name')
                ->searchable(),
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('slug')
                ->searchable(),
            Tables\Columns\TextColumn::make('balanceFloat')
                ->label('Balance')
                ->money(fn ($record) => $record->currency)
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
            ->filters([
                //
            ])
            ->actions([
                FundWallet::make()
                    ->modalWidth(MaxWidth::Small)
                    ->slideOver(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWallets::route('/'),
            'create' => Pages\CreateWallet::route('/create'),
        ];
    }
}
