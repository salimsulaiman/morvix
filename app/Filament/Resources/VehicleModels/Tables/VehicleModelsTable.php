<?php

namespace App\Filament\Resources\VehicleModels\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Pest\Support\View;

class VehicleModelsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('brand.name')
                    ->label('Brand Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Model Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label('Vehicle Type')
                    ->formatStateUsing(fn($state) => Str::title($state))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('Vehicle Type')
                    ->options([
                        'car' => 'Car',
                        'motorcycle' => 'Motorcycle',
                    ]),
                SelectFilter::make('vehicle_category_id')
                    ->label('Category')
                    ->relationship('category', 'name'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn() => currentUser()?->role === 'admin'),
                DeleteAction::make()
                    ->visible(fn() => currentUser()?->role === 'admin'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
