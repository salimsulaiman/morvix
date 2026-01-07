<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('id_photo')
                    ->label('Foto Identitas')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('No. HP'),

                TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->formatStateUsing(
                        fn($state) =>
                        $state === 'male' ? 'Laki-laki' : 'Perempuan'
                    ),

                IconColumn::make('is_verified')
                    ->label('Verifikasi')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Terdaftar')
                    ->date('d M Y'),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()->visible(fn($record) => currentUser()->role === 'admin')
            ]);
    }
}
