<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Tables\Table;
use Filament\Resources\Pages\list;
use App\Filament\Resources\UserResource;
use pxlrbt\FilamentActivityLog\Pages\ListActivities;

class ListUserActivities extends ListActivities
{
    protected static string $resource = UserResource::class;

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                
        ]);
    }
}
