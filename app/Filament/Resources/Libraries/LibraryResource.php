<?php

namespace App\Filament\Resources\Libraries;

use App\Filament\Resources\Libraries\Pages\CreateLibrary;
use App\Filament\Resources\Libraries\Pages\EditLibrary;
use App\Filament\Resources\Libraries\Pages\ListLibraries;
use App\Filament\Resources\Libraries\Schemas\LibraryForm;
use App\Filament\Resources\Libraries\Tables\LibrariesTable;
use App\Models\Library;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LibraryResource extends Resource
{
    protected static ?string $model = Library::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return LibraryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LibrariesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLibraries::route('/'),
            'create' => CreateLibrary::route('/create'),
            'edit' => EditLibrary::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
