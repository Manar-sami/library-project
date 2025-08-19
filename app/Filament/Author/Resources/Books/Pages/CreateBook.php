<?php

namespace App\Filament\Author\Resources\Books\Pages;

use App\Filament\Author\Resources\Books\BookResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBook extends CreateRecord
{
    protected static string $resource = BookResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['author_id'] = auth('author')->id();
    return $data;
}

}
