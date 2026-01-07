<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class BookingsTable
{

    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('booking_code')
                    ->label('Kode Booking')
                    ->searchable()
                    ->copyable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('vehicle.vehicleModel.name')
                    ->label('Kendaraan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('vehicle.license_plate')
                    ->label('Plat Nomor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('start_date')
                    ->label('Mulai')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('Selesai')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                TextColumn::make('total_days')
                    ->label('Hari')
                    ->sortable(),

                TextColumn::make('daily_price')
                    ->label('Harga / Hari')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('subtotal')
                    ->label('Subtotal')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('admin_fee')
                    ->label('Biaya Admin')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('total_price')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('payment_status')
                    ->label('Status Pembayaran')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        'refunded' => 'gray',
                    }),

                TextColumn::make('rental_status')
                    ->label('Status Rental')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'booked' => 'info',
                        'ongoing' => 'warning',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    }),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('payment_status')
                    ->label('Status Pembayaran')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ]),

                SelectFilter::make('rental_status')
                    ->label('Status Rental')
                    ->options([
                        'booked' => 'Booked',
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()->visible(
                    fn($record) =>
                    currentUser()->role === 'admin' ||
                        currentUser()->role === 'operator' ||
                        (currentUser()->role === 'customer' && $record->user_id === Auth::id())
                ),
                DeleteAction::make()->visible(fn() => currentUser()->role === 'admin'),
            ])
            ->defaultSort('created_at', 'desc')
        ;
    }
}
