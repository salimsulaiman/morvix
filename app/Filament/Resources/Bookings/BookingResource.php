<?php

namespace App\Filament\Resources\Bookings;

use App\Filament\Resources\Bookings\Pages\EditBooking;
use App\Filament\Resources\Bookings\Pages\ListBookings;
use App\Filament\Resources\Bookings\Schemas\BookingForm;
use App\Filament\Resources\Bookings\Tables\BookingsTable;
use App\Models\Booking as ModelsBooking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class BookingResource extends Resource
{
    protected static ?string $model = ModelsBooking::class;

    protected static string | UnitEnum | null $navigationGroup = 'Transaksi';

    protected static string | BackedEnum | null $navigationIcon =
    Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'Booking';

    public static function form(Schema $schema): Schema
    {
        return BookingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BookingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    public static function canCreate(): bool
    {
        return in_array(currentUser()->role, ['admin', 'operator', 'customer']);
    }

    public static function canEdit($record): bool
    {
        if (currentUser()->role === 'admin') return true;
        if (currentUser()->role === 'operator') return true; // update status booking
        if (currentUser()->role === 'customer') return $record->user_id === Auth::id();
        return false;
    }

    public static function canDelete($record): bool
    {
        return currentUser()->role === 'admin';
    }

    public static function canView($record = null): bool
    {
        if (currentUser()->role === 'admin') return true;
        if (currentUser()->role === 'operator') return true;
        if (currentUser()->role === 'customer') return $record?->user_id === Auth::id();
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBookings::route('/'),
            'edit' => EditBooking::route('/{record}/edit'),
        ];
    }
}
