<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Actions\Approve;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-currency-dollar';
    protected static ?string $navigationGroup = 'Wallets';

    public static function form(Form $form): Form
    {
        return $form;

    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn($query) => $query->latest())
            ->columns([
                Tables\Columns\TextColumn::make('uuid')
                    ->label('Tx ID')
                    ->description(fn($record) => ucfirst($record->type))
                    ->searchable(),
                Tables\Columns\TextColumn::make('payable.email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('wallet.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount_float')
                    ->label('Amount')
                    ->formatStateUsing(fn($record, $state) => money($state, $record->wallet->currency))
                    ->sortable(),
                Tables\Columns\IconColumn::make('confirmed')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Approve::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTransactions::route('/'),
        ];
    }
}
