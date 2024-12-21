<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TraderResource\Pages;
use App\Filament\Resources\TraderResource\RelationManagers;
use App\Models\Trader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TraderResource extends Resource
{
    protected static ?string $model = Trader::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->avatar()
                    ->hiddenLabel(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('profit_share')
                    ->required()
                    ->numeric()
                    ->suffix('%')
                    ->maxValue(100)
                    ->minValue(0)
                    ->default(0.00),
                Forms\Components\TextInput::make('wins')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('losses')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('win_rate')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('profit_share')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wins')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('losses')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTraders::route('/'),
            'create' => Pages\CreateTrader::route('/create'),
            'edit' => Pages\EditTrader::route('/{record}/edit'),
        ];
    }
}
