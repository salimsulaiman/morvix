<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('PaymentTabs')
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                Section::make('Informasi Pembayaran')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('status')
                                                ->label('Status')
                                                ->disabled(),

                                            TextInput::make('payment_gateway')
                                                ->label('Gateway')
                                                ->disabled(),

                                            TextInput::make('payment_type')
                                                ->label('Tipe Pembayaran')
                                                ->disabled(),

                                            TextInput::make('amount')
                                                ->label('Nominal')
                                                ->prefix('Rp')
                                                ->disabled(),

                                            TextInput::make('paid_at')
                                                ->label('Dibayar Pada')
                                                ->disabled(),
                                        ]),
                                    ]),
                            ]),

                        Tab::make('Booking')
                            ->schema([
                                Section::make('Informasi Booking')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('booking_code_view')
                                                ->label('Kode Booking')
                                                ->disabled()
                                                ->dehydrated(false)
                                                ->formatStateUsing(fn($record) => $record?->booking?->booking_code),

                                            TextInput::make('customer_name_view')
                                                ->label('Customer')
                                                ->disabled()
                                                ->dehydrated(false)
                                                ->formatStateUsing(fn($record) => $record?->booking?->user?->name),

                                            TextInput::make('booking_total_view')
                                                ->label('Total Booking')
                                                ->prefix('Rp')
                                                ->disabled()
                                                ->dehydrated(false)
                                                ->formatStateUsing(fn($record) => $record?->booking?->total_price),
                                        ]),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
