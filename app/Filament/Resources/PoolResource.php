<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PoolResource\Pages;
use App\Models\Pool;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PoolResource extends Resource
{
    protected static ?string $model = Pool::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('meta.image')
                    ->avatar()
                    ->required()
                    ->hiddenLabel()
                    ->columnSpanFull(),
                Forms\Components\Select::make('asset_id')
                    ->required()
                    ->relationship('asset', 'name'),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('min_amount')
                    ->placeholder('ex. 0.50')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('apr')
                    ->label('Annual Percentage Return')
                    ->placeholder('450')
                    ->suffix('%')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('meta.total_stake')
                    ->placeholder('ex. 400.00')
                    ->helperText('Total amount of stake in this pool.')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('meta.participants')
                    ->placeholder('ex. 1000')
                    ->helperText('Total number of people participating in this pool.')
                    ->numeric()
                    ->required(),
                Forms\Components\DatePicker::make('start_date'),
                Forms\Components\DatePicker::make('end_date'),
                Forms\Components\Textarea::make('meta.description')
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('asset.image')
                    ->label('')
                    ->inline()
                    ->size(20),
                Tables\Columns\TextColumn::make('name')
                    ->description(fn($record) => $record->asset->name)
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('min_amount')
                    ->numeric(),
                Tables\Columns\TextColumn::make('apr')
                    ->suffix('%')
                    ->numeric(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('From')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('To')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListPools::route('/'),
            'create' => Pages\CreatePool::route('/create'),
            'edit' => Pages\EditPool::route('/{record}/edit'),
        ];
    }
}
