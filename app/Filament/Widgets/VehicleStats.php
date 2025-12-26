<?php

namespace App\Filament\Widgets;

use App\Models\Vehicle;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VehicleStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Kendaraan', Vehicle::count())
                ->icon('heroicon-o-truck'),

            Stat::make('Available', Vehicle::where('status', 'available')->count())
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Rented', Vehicle::where('status', 'rented')->count())
                ->icon('heroicon-o-clock')
                ->color('warning'),

            Stat::make('Maintenance', Vehicle::where('status', 'maintenance')->count())
                ->icon('heroicon-o-wrench')
                ->color('danger'),
        ];
    }
}
