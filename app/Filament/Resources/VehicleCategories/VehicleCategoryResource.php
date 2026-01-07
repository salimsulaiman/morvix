<?php

namespace App\Filament\Resources\VehicleCategories;

use App\Filament\Resources\VehicleCategories\Pages\CreateVehicleCategory;
use App\Filament\Resources\VehicleCategories\Pages\EditVehicleCategory;
use App\Filament\Resources\VehicleCategories\Pages\ListVehicleCategories;
use App\Filament\Resources\VehicleCategories\Schemas\VehicleCategoryForm;
use App\Filament\Resources\VehicleCategories\Tables\VehicleCategoriesTable;
use App\Models\VehicleCategory as ModelsVehicleCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class VehicleCategoryResource extends Resource
{
    protected static ?string $model = ModelsVehicleCategory::class;

    protected static string | UnitEnum | null $navigationGroup = 'Master Data';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?int $navigationSort = 50;

    protected static ?string $recordTitleAttribute = 'Vehicle Category';

    public static function form(Schema $schema): Schema
    {
        return VehicleCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VehicleCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return currentUser()->role === 'admin';
    }

    public static function canEdit($record): bool
    {
        return currentUser()->role === 'admin';
    }

    public static function canDelete($record): bool
    {
        return currentUser()->role === 'admin';
    }

    public static function canView($record = null): bool
    {
        return true;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVehicleCategories::route('/'),
            'create' => CreateVehicleCategory::route('/create'),
            'edit' => EditVehicleCategory::route('/{record}/edit'),
        ];
    }
}
