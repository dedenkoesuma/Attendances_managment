<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeaveTypeResource\Pages;
use App\Filament\Resources\LeaveTypeResource\RelationManagers;
use App\Models\LeaveType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class LeaveTypeResource extends Resource
{
    protected static ?string $model = LeaveType::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Attendance Managment';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('leaves_type')->label('Jenis Cuti')->required(),
                TextArea::make('description')->label('Keterangan')->autosize()->required(),
                TextInput::make('quota')->label('Maksimal Waktu Cuti(PerHari)')->required()->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('leaves_type')->label('Jenis Cuti')->searchable()->sortable(),
                TextColumn::make('quota')->label('Maksimal Cuti(PerHari)')->searchable()->sortable(),
                TextColumn::make('description')->label('Deksripsi Cuti')->searchable()->sortable()
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
            'index' => Pages\ListLeaveTypes::route('/'),
            'create' => Pages\CreateLeaveType::route('/create'),
            'edit' => Pages\EditLeaveType::route('/{record}/edit'),
        ];
    }
}
