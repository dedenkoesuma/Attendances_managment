<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeaveResource\Pages;
use App\Filament\Resources\LeaveResource\RelationManagers;
use App\Models\Leave;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use App\Models\LeaveType;
use Illuminate\Validation\Rule;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class LeaveResource extends Resource
{
    protected static ?string $model = Leave::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('leave_types_id')
                    ->label('Jenis Cuti')
                    ->options(LeaveType::all()->pluck('leaves_type', 'id'))
                    ->searchable()
                    ->required(),

                DatePicker::make('start_date')
                    ->label('Mulai Cuti')
                    ->required(),

                DatePicker::make('end_date')
                    ->label('Selesai Cuti')
                    ->required(),

                Textarea::make('reason')
                    ->label('Alasan/Keterangan Cuti')
                    ->autosize()
                    ->required(),
                FileUpload::make('attachment')
                    ->label('Sertakan Lampiran/Surat Cuti')
                    ->preserveFilenames()
                    ->visibility('private'),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('LeaveType.leaves_type')->label('Jenis Cuti')->searchable()->sortable(),
                TextColumn::make('start_date')->label('Mulai Cuti')->searchable()->sortable(),
                TextColumn::make('end_date')->label('Selesai Cuti')->searchable()->sortable(),
                TextColumn::make('reason')->label('keterangan')->searchable()->sortable(),
                ImageColumn::make('attachment')->label('Lampiran/Bukti Cuti')->searchable()->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListLeaves::route('/'),
            'create' => Pages\CreateLeave::route('/create'),
            'edit' => Pages\EditLeave::route('/{record}/edit'),
        ];
    }
}
