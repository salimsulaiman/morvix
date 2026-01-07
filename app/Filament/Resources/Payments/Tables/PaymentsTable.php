<?php

namespace App\Filament\Resources\Payments\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('booking.booking_code')
                    ->label('Kode Booking')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('payment_gateway')
                    ->label('Gateway')
                    ->badge(),

                TextColumn::make('payment_type')
                    ->label('Tipe')
                    ->badge(),

                TextColumn::make('booking.total_price')
                    ->label('Total Booking')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('amount')
                    ->label('Dibayar')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('remaining_amount')
                    ->label('Sisa')
                    ->money('IDR')
                    ->state(fn($record) => max(
                        ($record->booking?->total_price ?? 0) - ($record->amount ?? 0),
                        0
                    ))
                    ->color(fn($state) => $state > 0 ? 'danger' : 'success'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        'refunded' => 'gray',
                    }),

                TextColumn::make('paid_at')
                    ->label('Dibayar Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ]),

                SelectFilter::make('payment_gateway')
                    ->options([
                        'xendit' => 'Xendit',
                        'midtrans' => 'Midtrans',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()->visible(
                    fn($record) =>
                    currentUser()->role === 'admin' ||
                        currentUser()->role === 'operator'
                ),
                DeleteAction::make()->visible(fn() => currentUser()->role === 'admin'),
            ])
            ->toolbarActions([]);
    }
}
