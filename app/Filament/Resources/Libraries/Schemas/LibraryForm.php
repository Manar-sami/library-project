<?php

namespace App\Filament\Resources\Libraries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LibraryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('country_code')
                    ->required(),
            ]);
    }
}
