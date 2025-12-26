<?php

namespace App\Filament\Widgets;

use App\Models\Discount;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class ActiveDiscounts extends TableWidget
{

    protected static ?string $heading = 'Diskon Aktif';
    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => Discount::query()->latest())
            ->columns([
                TextColumn::make('name')
                    ->label('Diskon'),

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
                    ->label('Nilai'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
