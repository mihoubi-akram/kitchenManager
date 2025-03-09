<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return Order::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('user_id')
                    ->label('User ID')
                    ->required()
                    ->numeric(),
                DatePicker::make('desired_delivery_date')
                    ->label('Desired Delivery Date')
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
                TextInput::make('address')
                    ->label('Delivery Address')
                    ->required(),
                TextInput::make('fee_per_delivery')
                    ->label('Delivery Fee')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
                ->columns([
                    TextColumn::make('user')
                        ->sortable()
                        ->searchable()
                        ->formatStateUsing(fn($record) => $record->user->name),
                    TextColumn::make('desired_delivery_date')
                        ->sortable()
                        ->label('Delivery Date')
                        ->formatStateUsing(fn($record) => date('d/m/Y', strtotime($record->desired_delivery_date))),
    
                    TextColumn::make('status')
                        ->sortable()
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'pending' => 'warning',
                            'completed' => 'success',
                            'cancelled' => 'danger',
                        }),
    
                    TextColumn::make('address')
                        ->label('Delivery Address')
                        ->sortable()
                        ->searchable()
                        ->formatStateUsing(fn($record) => "<em>{$record->address}</em>")
                        ->html(),
    
                    TextColumn::make('fee_per_delivery')
                        ->label('Delivery Fee')
                        ->sortable()
                        ->formatStateUsing(fn($record) => $record->fee_per_delivery . '$')
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
