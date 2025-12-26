<?php

namespace App\Filament\Resources\VehicleModels\Schemas;

use Dom\Text;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VehicleModelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Vehicle Model Details')
                    ->description('Provide the details for the vehicle model.')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('brand_id')
                            ->label('Brand')
                            ->relationship('brand', 'name')
                            ->required()
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
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->maxLength(255)
                            ->columnSpan(1)
                            ->hint('Optional. Jika dikosongkan, akan otomatis digenerate dari Model Name.')
                            ->nullable()
                            ->unique(ignoreRecord: true),
                        Select::make('type')
                            ->label('Vehicle Type')
                            ->options([
                                'car' => 'Car',
                                'motorcycle' => 'Motorcycle',
                            ])
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpan(1),
                        Select::make('vehicle_category_id')
                            ->label('Vehicle Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Category Name')
                                    ->maxLength(255)
                                    ->required()
                                    ->columnSpan(2),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->required()
                                    ->columnSpan(2),
                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(4)
                                    ->columnSpanFull()
                                    ->maxLength(500),
                            ]),
                    ])
            ]);
    }
}
