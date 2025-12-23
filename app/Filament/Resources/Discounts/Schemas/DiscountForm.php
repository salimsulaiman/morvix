<?php

namespace App\Filament\Resources\Discounts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class DiscountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                Select::make('type')
                    ->options([
                        'percentage' => 'Percentage (%)',
                        'fixed' => 'Fixed Amount',
                    ])
                    ->required()
                    ->reactive(),

                TextInput::make('value')
                    ->numeric()
                    ->required()
                    ->label(
                        fn(Get $get) =>
                        $get('type') === 'percentage'
                            ? 'Discount Percentage (%)'
                            : 'Discount Amount'
                    ),

                Toggle::make('is_active')
                    ->default(true),

                DateTimePicker::make('start_at'),
                DateTimePicker::make('end_at'),
            ]);
    }
}
