<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Products';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('brand')->nullable(),
                TextInput::make('type')->required(),
                TextInput::make('quantity')->numeric()->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
