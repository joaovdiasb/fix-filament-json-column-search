<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JsonTableResource\Pages;
use App\Filament\Resources\JsonTableResource\RelationManagers;
use App\Models\JsonTable;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JsonTableResource extends Resource
{
    protected static ?string $model = JsonTable::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                         //
                     ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                          Tables\Columns\TextColumn::make('data.tipo_pessoa')
                                                   ->label('Nome')
                                                   ->sortable(
                                                       query: function(Builder $query, string $direction): Builder {
                                                           return $query->orderBy('data->tipo_pessoa', $direction);
                                                       }
                                                   )
                                                   ->searchable(
                                                       query: function(Builder $query, string $search): Builder {
                                                           return $query->where('data->tipo_pessoa', 'LIKE', "%{$search}%");
                                                       },
                                                       isIndividual: true,
                                                   ),
                      ])
            ->filters([
                          //
                      ])
            ->actions([
                          Tables\Actions\EditAction::make(),
                      ])
            ->bulkActions([
                              Tables\Actions\DeleteBulkAction::make(),
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
            'index'  => Pages\ListJsonTables::route('/'),
            'create' => Pages\CreateJsonTable::route('/create'),
            'edit'   => Pages\EditJsonTable::route('/{record}/edit'),
        ];
    }
}
