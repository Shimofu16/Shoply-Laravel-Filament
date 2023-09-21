<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use App\Filament\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermission extends EditRecord
{
    protected static string $resource = PermissionResource::class;

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
        return 'Permission successfully updated';
    }
}
