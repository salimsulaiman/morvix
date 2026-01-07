<?php

namespace App\Filament\Resources\Vehicles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class VehiclesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('images.image_url')
                    ->label('Photo')
                    ->disk('public')
                    ->circular()
                    ->getStateUsing(
                        fn($record) =>
                        optional($record->images->firstWhere('is_primary', true))->image_url
                            ?? optional($record->images->first())->image_url
                    ),

                TextColumn::make('vehicleModel.name')
                    ->label('Model')
                    ->formatStateUsing(
                        fn($state, $record) =>
                        match ($record->vehicleModel->type) {
                            'car' => 'Mobil',
                            'motorcycle' => 'Motor',
                            default => ucfirst($record->vehicleModel->type),
                        } . ' ' . $state
                    )
                    ->searchable()
                    ->sortable(),

                TextColumn::make('vehicleModel.brand.name')
                    ->label('Brand')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('license_plate')
                    ->label('Plate')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('year')
                    ->label('Year')
                    ->sortable(),

                TextColumn::make('color')
                    ->label('Color'),

                TextColumn::make('daily_price')
                    ->label('Daily Price')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('location.name')
                    ->label('Location')
                    ->formatStateUsing(
                        fn($state, $record) =>
                        "{$state} - {$record->location->city->name}"
                    )
                    ->searchable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'available',
                        'warning' => 'maintenance',
                        'danger' => 'rented',
                    ])
                    ->icons([
                        'heroicon-o-check-circle' => 'available',
                        'heroicon-o-wrench' => 'maintenance',
                        'heroicon-o-x-circle' => 'rented',
                    ])
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'available' => 'Available',
                        'rented' => 'Rented',
                        'maintenance' => 'Maintenance',
                    ]),

                SelectFilter::make('vehicle_model.brand_id')
                    ->label('Brand')
                    ->relationship('vehicleModel.brand', 'name'),

                SelectFilter::make('type')
                    ->label('Tipe Kendaraan')
                    ->options([
                        'car'        => 'Mobil',
                        'motorcycle' => 'Motor',
                    ])
                    ->query(function ($query, $data) {
                        if (! $data['value']) {
                            return;
                        }

                        $query->whereHas('vehicleModel', function ($q) use ($data) {
                            $q->where('type', $data['value']);
                        });
                    }),

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
