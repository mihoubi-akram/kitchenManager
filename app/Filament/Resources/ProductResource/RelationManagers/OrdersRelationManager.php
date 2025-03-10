<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user_id')
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
