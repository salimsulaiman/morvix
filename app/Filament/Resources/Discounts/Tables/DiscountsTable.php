<?php

namespace App\Filament\Resources\Discounts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DiscountsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Discount Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(
                        fn($state) =>
                        $state === 'percentage'
                            ? 'Percentage'
                            : 'Fixed'
                    )
                    ->color(
                        fn($state) =>
                        $state === 'percentage'
                            ? 'success'
                            : 'info'
                    ),

                TextColumn::make('value')
                    ->label('Value')
                    ->formatStateUsing(
                        fn($record) =>
                        $record->type === 'percentage'
                            ? $record->value . '%'
                            : 'Rp ' . number_format($record->value, 0, ',', '.')
                    )
                    ->sortable(),

                TextColumn::make('start_at')
                    ->label('Start')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('end_at')
                    ->label('End')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
