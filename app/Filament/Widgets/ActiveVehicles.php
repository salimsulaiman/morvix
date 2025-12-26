<?php

namespace App\Filament\Widgets;

use App\Models\Vehicle;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActiveVehicles extends TableWidget
{

    protected static ?string $heading = 'Kendaraan Aktif';
    protected static ?int $sort = 1;
    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => Vehicle::query()->latest())
            ->columns([
                TextColumn::make('license_plate')
                    ->label('Plat')
                    ->searchable(),

                TextColumn::make('vehicleModel.name')
                    ->label('Model'),

                BadgeColumn::make('status')
                    ->colors([
                        'success' => 'available',
                        'warning' => 'rented',
                        'danger'  => 'maintenance',
                    ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'available' => 'Available',
                        'rented' => 'Rented',
                        'maintenance' => 'Maintenance',
                    ]),
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
