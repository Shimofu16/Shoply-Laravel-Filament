<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    // redirect user to index
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    // Change the Success Message
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Role successfully created';
    }

}
