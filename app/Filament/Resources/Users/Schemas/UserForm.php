<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('User Tabs')
                    ->columnSpanFull()
                    ->tabs([

                        Tab::make('Data Customer')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('name')
                                            ->required(),

                                        TextInput::make('email')
                                            ->email()
                                            ->required(),

                                        TextInput::make('password')
                                            ->password()
                                            ->label('Password Baru')
                                            ->dehydrateStateUsing(
                                                fn($state) => filled($state)
                                                    ? bcrypt($state)
                                                    : null
                                            )
                                            ->dehydrated(fn($state) => filled($state)),

                                        TextInput::make('phone')
                                            ->label('No. HP'),

                                        Select::make('gender')
                                            ->options([
                                                'male' => 'Laki-laki',
                                                'female' => 'Perempuan',
                                            ])
                                            ->required(),

                                        DatePicker::make('date_of_birth')
                                            ->label('Tanggal Lahir'),

                                        TextInput::make('address')
                                            ->label('Alamat')
                                            ->columnSpanFull(),

                                        TextInput::make('id_number')
                                            ->label('No. Identitas'),

                                        FileUpload::make('id_photo')
                                            ->label('Foto Identitas')
                                            ->image()
                                            ->disk('public')
                                            ->directory('id-photos'),

                                        Toggle::make('is_verified')
                                            ->label('Terverifikasi'),

                                        TextInput::make('role')
                                            ->default('customer')
                                            ->disabled()
                                            ->dehydrated(),
                                    ])
                                    ->columns(2),
                            ]),

                        /* ===========================
                     | TAB DATA SIM (READ ONLY)
                     =========================== */
                        Tab::make('Data SIM')
                            ->icon('heroicon-o-identification')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Repeater::make('sims')
                                            ->label('')
                                            ->relationship('sims')
                                            ->disabled()
                                            ->dehydrated(false)
                                            ->schema([
                                                Grid::make(2)->schema([
                                                    TextInput::make('sim_number')
                                                        ->label('Nomor SIM')
                                                        ->disabled(),

                                                    TextInput::make('sim_type')
                                                        ->label('Jenis SIM')
                                                        ->disabled(),

                                                    DatePicker::make('expired_at')
                                                        ->label('Berlaku Sampai')
                                                        ->disabled(),

                                                    Toggle::make('is_active')
                                                        ->label('Aktif')
                                                        ->disabled(),

                                                    FileUpload::make('sim_photo')
                                                        ->label('Foto SIM')
                                                        ->image()
                                                        ->disk('public')
                                                        ->disabled()
                                                        ->columnSpanFull(),
                                                ]),
                                            ])
                                            ->columns(1),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
