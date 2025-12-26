<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Feature Information')
                    ->description('Kelola data fitur yang tersedia')
                    ->columnSpanFull()
                    ->schema([
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
                    ])
                    ->columns(2),
            ]);
    }
}
