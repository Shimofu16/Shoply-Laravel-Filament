<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatusEnum;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Sales Management';

    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->where('status',OrderStatusEnum::PENDING);
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        /**
         *total_amount
discount_amount
shipping_amount
grand_total
status
payment_method
payment_status
shipping_method
notes
         *
         *
         *
         *
         *
         */
        return $table
            ->columns([
                TextColumn::make('order_number')
                    ->searchable(),
                TextColumn::make('customer.name')
                    ->searchable(),
                TextColumn::make('total_amount'),
                TextColumn::make('discount_amount'),
                TextColumn::make('shipping_amount'),
                TextColumn::make('grand_total'),
                IconColumn::make('status')
                ->icon(fn (string $state): string => match ($state) {
                    OrderStatusEnum::PENDING => 'heroicon-o-clock',
                    OrderStatusEnum::PROCESSING => 'heroicon-o-refresh',
                    OrderStatusEnum::COMPLETED => 'heroicon-o-check-circle',
                    OrderStatusEnum::DECLINED => 'heroicon-o-ban',
                    OrderStatusEnum::CANCELLED => 'heroicon-o-ban',
                    OrderStatusEnum::REFUNDED => 'heroicon-o-refresh',
                    OrderStatusEnum::FAILED => 'heroicon-o-x-circle',
                })
                ->color(fn (string $state): string => match ($state) {
                    OrderStatusEnum::PENDING => 'gray',
                    OrderStatusEnum::PROCESSING => 'blue',
                    OrderStatusEnum::COMPLETED => 'green',
                    OrderStatusEnum::DECLINED => 'red',
                    OrderStatusEnum::CANCELLED => 'red',
                    OrderStatusEnum::REFUNDED => 'blue',
                    OrderStatusEnum::FAILED => 'red',
                }),
                TextColumn::make('payment_method'),
                IconColumn::make('payment_status')
                ->icon(fn (string $state): string => match ($state) {
                    OrderStatusEnum::PENDING => 'heroicon-o-clock',
                    OrderStatusEnum::COMPLETED => 'heroicon-o-check-circle',
                    OrderStatusEnum::FAILED => 'heroicon-o-x-circle',
                })
                ->color(fn (string $state): string => match ($state) {
                    OrderStatusEnum::PENDING => 'gray',
                    OrderStatusEnum::COMPLETED => 'green',
                    OrderStatusEnum::FAILED => 'red',
                }),
                TextColumn::make('shipping_method'),
                TextColumn::make('notes'),
            ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
