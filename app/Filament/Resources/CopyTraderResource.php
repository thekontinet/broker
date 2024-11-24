<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CopyTraderResource\Pages;
use App\Filament\Resources\CopyTraderResource\RelationManagers;
use App\Models\CopyTrader;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CopyTraderResource extends Resource
{
    protected static ?string $model = CopyTrader::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\Select::make('trading_day')->required()->options([
                    'sunday' => 'Sunday',
                    'monday' => 'Monday',
                    'tuesday' => 'Tuesday',
                    'wednesday' => 'Wednesday',
                    'thursday' => 'Thursday',
                    'friday' => 'Friday',
                    'saturday' => 'Saturday',
                ]),
                Forms\Components\TextInput::make('ROI')->required(),
                Forms\Components\TextInput::make('average_PnL')->required(),
                Forms\Components\TextInput::make('max_copiers')->required(),
                Forms\Components\TextInput::make('min_copy_amount')->required(),
                Forms\Components\Select::make('trading_style')->required()->options(['stocks' => "Stocks", 'forex' => 'Forex', 'assets' => 'Assets']),
                Forms\Components\Select::make('specialization')->required()->options(['conservative' => "Conservative", 'aggressive' => 'Aggressive']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('trading_day')->searchable(),
                Tables\Columns\TextColumn::make('ROI')->numeric(),
                Tables\Columns\TextColumn::make('average_PnL')->numeric(),
                Tables\Columns\TextColumn::make('max_copiers')->numeric(),
                Tables\Columns\TextColumn::make('min_copy_amount')->numeric(),
                Tables\Columns\TextColumn::make('specialization'),
                Tables\Columns\TextColumn::make('trading_style'),
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
            'index' => Pages\ListCopyTraders::route('/'),
            'create' => Pages\CreateCopyTrader::route('/create'),
            'edit' => Pages\EditCopyTrader::route('/{record}/edit'),
        ];
    }
}
