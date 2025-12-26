<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\VehicleStats;
use BackedEnum;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Icons\Heroicon;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Dashboard';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;
    protected static ?string $slug = 'dashboard';
}
