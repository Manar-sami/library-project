<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('country')
                    ->required(),
                TextInput::make('books_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('library_id')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
