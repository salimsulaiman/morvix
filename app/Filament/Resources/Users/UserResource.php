<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use Illuminate\Database\Eloquent\Builder;

use App\Models\User as ModelsUser;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class UserResource extends Resource
{
    protected static ?string $model = ModelsUser::class;

    protected static string | UnitEnum | null $navigationGroup = 'Master Data';

    protected static string | BackedEnum | null $navigationIcon =
    Heroicon::OutlinedUserCircle;

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('role', 'customer');
    }

    public static function canCreate(): bool
    {
        return in_array(currentUser()->role, ['admin', 'operator']);
    }

    public static function canEdit($record): bool
    {
        if (currentUser()->role === 'admin') return true;
        if (currentUser()->role === 'operator') return $record->role !== 'admin'; // operator tidak bisa edit admin
        return false;
    }

    public static function canDelete($record): bool
    {
        return currentUser()->role === 'admin';
    }

    public static function canView($record = null): bool
    {
        if (currentUser()->role === 'admin') return true;
        if (currentUser()->role === 'operator') return $record->role !== 'admin';
        return $record?->id === Auth::id();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
