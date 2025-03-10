<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                ->sortable()
                ->searchable()
                ->formatStateUsing(function ($record) {
                    $unitQuantity = $record->unit_quantity;
                    $unitQuantityFormatted = fmod($unitQuantity, 1) == 0 ? (int) $unitQuantity: rtrim(rtrim(number_format($unitQuantity, 2, '.', ''), '0'), '.');
                    return "<strong> {$record->name} {$unitQuantityFormatted}{$record->unit_of_measure}</strong>";
                })->html(),
                TextColumn::make('brand')->sortable()->searchable(),
                TextColumn::make('type')
                    ->sortable()
                    ->formatStateUsing(function ($record) {
                        return $record->type === 'pack' ? "📦 Pack <strong>(x{$record->quantity})</strong>" : "🏷️ Single Unit";
                    })->html(),
                TextColumn::make('category')->sortable()->searchable(),
            TextColumn::make('store_name')->label('Store')->sortable()->searchable()
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
