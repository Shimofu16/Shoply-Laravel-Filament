<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // redirect user to index
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    // Change the Success Message
    protected function getUpdatedNotificationTitle(): ?string
    {
        return 'Role successfully updated';
    }
}
