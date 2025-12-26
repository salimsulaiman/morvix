<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use App\Filament\Resources\Vehicles\RelationManagers\DiscountsRelationManager;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get as UtilitiesGet;
use Filament\Schemas\Schema;

class VehicleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('General Information')
                            ->schema([
                                Section::make('Informasi Kendaraan')
                                    ->description('Data utama kendaraan')
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([
                                        Select::make('vehicle_model_id')
                                            ->label('Vehicle Model')
                                            ->relationship('vehicleModel', 'name')
                                            ->getOptionLabelFromRecordUsing(
                                                fn($record) => match ($record->type) {
                                                    'car' => 'Mobil',
                                                    'motorcycle' => 'Motor',
                                                    default => ucfirst($record->type),
                                                } . " {$record->name}"
                                            )
                                            ->searchable()
                                            ->preload()
                                            ->required()
                                            ->createOptionForm([
                                                Select::make('brand_id')
                                                    ->label('Brand')
                                                    ->relationship('brand', 'name')
                                                    ->required()
                                                    ->columnSpan(2)
                                                    ->searchable()
                                                    ->preload()
                                                    ->createOptionForm([
                                                        TextInput::make('name')
                                                            ->label('Brand Name')
                                                            ->maxLength(255)
                                                            ->required()
                                                            ->columnSpan(2)
                                                    ]),
                                                TextInput::make('name')
                                                    ->label('Model Name')
                                                    ->maxLength(255)
                                                    ->columnSpan(2)
                                                    ->required(),
                                                Select::make('type')
                                                    ->label('Vehicle Type')
                                                    ->options([
                                                        'car' => 'Car',
                                                        'motorcycle' => 'Motorcycle',
                                                    ])
                                                    ->searchable()
                                                    ->preload()
                                                    ->required()
                                                    ->columnSpan(2)
                                            ]),

                                        TextInput::make('license_plate')
                                            ->label('License Plate')
                                            ->required()
                                            ->maxLength(20),

                                        TextInput::make('year')
                                            ->numeric()
                                            ->required(),

                                        TextInput::make('color')
                                            ->required(),
                                    ]),

                                Section::make('Spesifikasi Teknis')
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([
                                        Select::make('transmission')
                                            ->options([
                                                'manual' => 'Manual',
                                                'automatic' => 'Automatic',
                                            ])
                                            ->required(),

                                        Select::make('fuel_type')
                                            ->options([
                                                'gasoline' => 'Gasoline',
                                                'diesel' => 'Diesel',
                                                'electric' => 'Electric',
                                            ])
                                            ->required()
                                            ->reactive(),
                                    ]),

                                Section::make('Kapasitas')
                                    ->description('Kapasitas tergantung jenis bahan bakar')
                                    ->columnSpanFull()
                                    ->columns(3)
                                    ->schema([
                                        TextInput::make('fuel_tank_capacity')
                                            ->label('Fuel Tank Capacity (L)')
                                            ->numeric()
                                            ->visible(fn(UtilitiesGet $get) => $get('fuel_type') !== 'electric'),


                                        TextInput::make('battery_capacity_kwh')
                                            ->label('Battery Capacity (kWh)')
                                            ->numeric()
                                            ->visible(fn(UtilitiesGet $get) => $get('fuel_type') === 'electric'),

                                        TextInput::make('seats')
                                            ->label('Seats')
                                            ->numeric()
                                            ->required(),
                                    ]),

                                Section::make('Harga & Deposit')
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('daily_price')
                                            ->label('Daily Price')
                                            ->numeric()
                                            ->prefix('Rp')
                                            ->reactive()
                                            ->debounce(500)
                                            ->afterStateUpdated(
                                                fn($state, callable $set) =>
                                                $set('deposit_amount', ($state * 30) * 0.2)
                                            )
                                            ->required(),

                                        TextInput::make('hourly_price')
                                            ->label('Hourly Price')
                                            ->numeric()
                                            ->prefix('Rp'),

                                        TextInput::make('deposit_percentage')
                                            ->label('Deposit (%)')
                                            ->numeric()
                                            ->suffix('%')
                                            ->default(20)
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                                $daily = $get('daily_price') ?? 0;
                                                $set('deposit_amount', ($daily * 30) * ($state / 100));
                                            }),

                                        TextInput::make('deposit_amount')
                                            ->label('Deposit Amount')
                                            ->numeric()
                                            ->prefix('Rp')
                                            ->disabled()
                                            ->dehydrated()
                                    ]),

                                Section::make('Lokasi & Status')
                                    ->columnSpanFull()
                                    ->columns(2)
                                    ->schema([
                                        Select::make('location_id')
                                            ->relationship('location', 'name')
                                            ->getOptionLabelFromRecordUsing(
                                                fn($record) => "{$record->name} - {$record->city->name}"
                                            )
                                            ->searchable()
                                            ->preload()
                                            ->required()
                                            ->createOptionForm([
                                                TextInput::make('name')
                                                    ->label('Location Name')
                                                    ->maxLength(255)
                                                    ->required()
                                                    ->columnSpan(2),
                                                Select::make('city_id')
                                                    ->label('City')
                                                    ->relationship('city', 'name')
                                                    ->required()
                                                    ->searchable()
                                                    ->preload()
                                                    ->createOptionForm([
                                                        TextInput::make('name')
                                                            ->label('City Name')
                                                            ->maxLength(255)
                                                            ->required()
                                                            ->columnSpan(2)
                                                    ]),
                                                TextInput::make('address')
                                                    ->label('Address')
                                                    ->maxLength(500)
                                                    ->columnSpan(2)
                                                    ->required(),
                                                TextInput::make('map_url')
                                                    ->label('Map URL')
                                                    ->maxLength(500)
                                            ]),
                                        Select::make('status')
                                            ->options([
                                                'available' => 'Available',
                                                'rented' => 'Rented',
                                                'maintenance' => 'Maintenance',
                                            ])
                                            ->default('available')
                                            ->required(),
                                    ]),

                                Section::make('Deskripsi')
                                    ->columnSpanFull()
                                    ->schema([
                                        RichEditor::make('description')
                                            ->label('Description')
                                    ]),
                            ]),
                        Tab::make('Photos')
                            ->schema([
                                Section::make('Vehicle Photos')
                                    ->description('Upload photos of the vehicle.')
                                    ->columnSpanFull()
                                    ->schema([
                                        Repeater::make('photos')
                                            ->label('Photos')
                                            ->relationship('images')
                                            ->maxItems(10)
                                            ->minItems(1)
                                            ->required()
                                            ->schema([
                                                FileUpload::make('image_url')
                                                    ->label('Photo')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('vehicles')
                                                    ->imagePreviewHeight('150')
                                                    ->required(),

                                                Toggle::make('is_primary')
                                                    ->label('Primary Photo')
                                                    ->inline(false)
                                                    ->helperText('Set as main photo'),
                                            ]),
                                    ]),
                            ]),
                        Tab::make('Feature')
                            ->schema([
                                MultiSelect::make('features')
                                    ->relationship('features', 'name')
                                    ->label('Features Kendaraan')
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label('Nama Feature')
                                            ->required()
                                            ->columnSpan(1)
                                            ->maxLength(100),

                                        TextInput::make('icon')
                                            ->label('Icon (Feather Icon)')
                                            ->placeholder('contoh: home, settings, user')
                                            ->helperText('Gunakan nama icon dari Feather Icons tanpa prefix')
                                            ->columnSpan(1)
                                            ->required(),

                                        Textarea::make('description')
                                            ->label('Deskripsi')
                                            ->rows(4)
                                            ->columnSpanFull()
                                            ->maxLength(255),
                                    ]),
                            ])
                    ])
                    ->columnSpanFull()
            ]);
    }
}
