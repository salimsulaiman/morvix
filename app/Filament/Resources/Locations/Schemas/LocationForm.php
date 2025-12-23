<?php

namespace App\Filament\Resources\Locations\Schemas;

use Dom\Text;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Location Name')
                    ->required()
                    ->maxLength(255),

                Select::make('city_id')
                    ->label('City')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Textarea::make('address')
                    ->label('Address')
                    ->required()
                    ->rows(3)
                    ->maxLength(500),

                TextInput::make('map_url')
                    ->label('Google Maps URL')
                    ->placeholder('https://www.google.com/maps/embed?...')
                    ->required()
                    ->url(),
            ]);
    }
}
