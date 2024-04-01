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
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\TextColumn;

class WorkingHoursResource extends Resource
{
    protected static ?string $model = WorkingHours::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Attendance Managment';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('day')
                ->label('Hari Kerja')
                ->required(),

                TimePicker::make('start_time')
                ->label('Jam Masuk Kerja')
                ->required(),

                TimePicker::make('end_time')
                ->label('Jam Keluar Kerja')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day')->label('Hari Kerja')->sortable()->searchable(),
                TextColumn::make('start_time')->label('Jam Masuk')->sortable()->searchable(),
                TextColumn::make('end_time')->label('Jam Keluar')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
