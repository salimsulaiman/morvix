<?php

namespace App\Filament\Resources\Vehicles\RelationManagers;

use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DiscountsRelationManager extends RelationManager
{
    protected static string $relationship = 'discounts';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Diskon'),

                BadgeColumn::make('type')
                    ->colors([
                        'success' => 'percentage',
                        'warning' => 'fixed',
                    ]),

                TextColumn::make('value')
                    ->formatStateUsing(
                        fn($record) =>
                        $record->type === 'percentage'
                            ? "{$record->value}%"
                            : 'Rp ' . number_format($record->value, 0, ',', '.')
                    ),

                IconColumn::make('is_active')
                    ->boolean(),

                TextColumn::make('start_at')
                    ->date(),

                TextColumn::make('end_at')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                AttachAction::make()
                    ->preloadRecordSelect()
                    ->recordSelectOptionsQuery(
                        fn($query) =>
                        $query->where('is_active', true)
                    ),
            ])
            ->recordActions([
                DetachAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DetachBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
