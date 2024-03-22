<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkingHoursResource\Pages;
use App\Filament\Resources\WorkingHoursResource\RelationManagers;
use App\Models\WorkingHours;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkingHoursResource extends Resource
{
    protected static ?string $model = WorkingHours::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

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
                //
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
            'index' => Pages\ListWorkingHours::route('/'),
            'create' => Pages\CreateWorkingHours::route('/create'),
            'edit' => Pages\EditWorkingHours::route('/{record}/edit'),
        ];
    }
}
