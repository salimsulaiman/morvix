<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('BookingTabs')
                    ->tabs([
                        Tab::make('General')
                            ->icon('heroicon-o-clipboard-document')
                            ->schema([
                                Section::make('Informasi Booking')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('booking_code')
                                                ->label('Kode Booking')
                                                ->disabled(),

                                            Select::make('rental_status')
                                                ->label('Status Rental')
                                                ->options([
                                                    'booked' => 'Booked',
                                                    'ongoing' => 'Ongoing',
                                                    'completed' => 'Completed',
                                                    'cancelled' => 'Cancelled',
                                                ])
                                                ->required(),

                                            Select::make('payment_status')
                                                ->label('Status Pembayaran')
                                                ->options([
                                                    'pending' => 'Pending',
                                                    'paid' => 'Paid',
                                                    'failed' => 'Failed',
                                                    'refunded' => 'Refunded',
                                                ])
                                                ->disabled(),

                                            TextInput::make('total_days')
                                                ->label('Total Hari')
                                                ->numeric()
                                                ->disabled(),

                                            DateTimePicker::make('start_date')
                                                ->label('Tanggal Mulai')
                                                ->disabled(),

                                            DateTimePicker::make('end_date')
                                                ->label('Tanggal Selesai')
                                                ->disabled(),
                                        ]),
                                    ]),
                            ]),

                        Tab::make('Vehicle')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Section::make('Data Kendaraan')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('vehicle_name')
                                                ->label('Nama Kendaraan')
                                                ->disabled()
                                                ->dehydrated(false)
                                                ->formatStateUsing(fn($record) => $record?->vehicle?->vehicleModel?->name),

                                            TextInput::make('vehicle_type')
                                                ->label('Tipe')
                                                ->disabled()
                                                ->dehydrated(false)
                                                ->formatStateUsing(fn($record) => $record?->vehicle?->vehicleModel?->type),

                                            TextInput::make('vehicle_category')
                                                ->label('Kategori')
                                                ->disabled()
                                                ->dehydrated(false)
                                                ->formatStateUsing(fn($record) => $record?->vehicle?->vehicleModel?->category?->name),

                                            TextInput::make('vehicle_color')
                                                ->label('Warna')
                                                ->disabled()
                                                ->dehydrated(false)
                                                ->formatStateUsing(fn($record) => $record?->vehicle?->color),

                                            TextInput::make('vehicle_daily_price')
                                                ->label('Harga / Hari')
                                                ->prefix('Rp')
                                                ->disabled()
                                                ->dehydrated(false)
                                                ->formatStateUsing(fn($record) => $record?->vehicle?->daily_price),

                                            TextInput::make('vehicle_plate_number')
                                                ->label('Plat Nomor')
                                                ->disabled()
                                                ->dehydrated(false)
                                                ->formatStateUsing(fn($record) => $record?->vehicle?->license_plate),
                                        ]),
                                    ]),
                            ]),

                        Tab::make('Customer')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Section::make('Informasi Customer')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextEntry::make('user.name')
                                                ->label('Nama'),

                                            TextEntry::make('user.email')
                                                ->label('Email'),

                                            TextEntry::make('user.phone')
                                                ->label('No. HP'),

                                            TextEntry::make('user.address')
                                                ->label('Alamat'),

                                            TextEntry::make('user.id_number')
                                                ->label('No. Identitas'),

                                            TextEntry::make('user.gender')
                                                ->label('Jenis Kelamin')
                                                ->formatStateUsing(fn($state) => match ($state) {
                                                    'male' => 'Laki-laki',
                                                    'female' => 'Perempuan',
                                                    default => '-',
                                                }),


                                            TextEntry::make('user.date_of_birth')
                                                ->label('Tanggal Lahir')
                                                ->date('d F Y'),

                                            TextEntry::make('user.is_verified')
                                                ->label('Status Verifikasi')
                                                ->formatStateUsing(fn($state) => $state ? 'Terverifikasi' : 'Belum Terverifikasi')
                                                ->badge()
                                                ->color(fn($state) => $state ? 'success' : 'danger'),
                                        ]),
                                    ]),

                                Section::make('Data SIM')
                                    ->schema([
                                        RepeatableEntry::make('user.sims')
                                            ->schema([
                                                Grid::make(2)->schema([
                                                    TextEntry::make('sim_number')
                                                        ->label('Nomor SIM'),

                                                    TextEntry::make('sim_type')
                                                        ->label('Jenis SIM'),

                                                    TextEntry::make('expired_at')
                                                        ->label('Berlaku Sampai')
                                                        ->date('d F Y'),

                                                    TextEntry::make('is_active')
                                                        ->label('Status')
                                                        ->formatStateUsing(fn($state) => $state ? 'Aktif' : 'Tidak Aktif')
                                                        ->badge()
                                                        ->color(fn($state) => $state ? 'success' : 'gray'),

                                                    ImageEntry::make('sim_photo')
                                                        ->label('Foto SIM')
                                                        ->disk('public')
                                                        ->height(200)
                                                        ->columnSpanFull(),
                                                ]),
                                            ]),
                                    ]),
                            ]),


                        Tab::make('Payment')
                            ->icon('heroicon-o-banknotes')
                            ->schema([
                                Section::make('Detail Harga')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('daily_price')
                                                ->label('Harga / Hari')
                                                ->prefix('Rp')
                                                ->disabled(),

                                            TextInput::make('subtotal')
                                                ->label('Subtotal')
                                                ->prefix('Rp')
                                                ->disabled(),

                                            TextInput::make('admin_fee')
                                                ->label('Biaya Admin')
                                                ->prefix('Rp')
                                                ->disabled(),

                                            TextInput::make('total_price')
                                                ->label('Total Bayar')
                                                ->prefix('Rp')
                                                ->disabled(),

                                            TextInput::make('deposit_amount')
                                                ->label('DP')
                                                ->prefix('Rp')
                                                ->disabled(),
                                        ]),
                                    ]),
                            ]),

                        Tab::make('Notes')
                            ->icon('heroicon-o-chat-bubble-left-ellipsis')
                            ->schema([
                                Textarea::make('notes')
                                    ->label('Catatan Booking')
                                    ->rows(4)
                                    ->disabled(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
