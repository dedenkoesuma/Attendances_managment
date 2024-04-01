<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Attendance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\TextColumn;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Attendance Managment';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('date')
                    ->label('Tanggal Hadir')
                    ->required()
                    ->rules(['date', 'before_or_equal:' . now()->format('Y-m-d')]),

                Select::make('absen_type')
                    ->options([
                        'masuk' => 'Absen Masuk',
                        'keluar' => 'Absen Keluar',
                    ])
                    ->label('Tipe Absen')
                    ->required()
                    ->reactive(),

                    TimePicker::make('time_in')
                        ->label('Waktu Absen Masuk')
                        ->hidden(fn ($get) => $get('absen_type') !== 'masuk')
                        ->required()->afterStateUpdated(function ($state, $set, $get) {
                            if ($get('masuk')) {
                                $set('keluar', null);
                            }
                        }),

                    TimePicker::make('time_out')
                        ->label('Waktu Absen Keluar')
                        ->hidden(fn ($get) => $get('absen_type') !== 'keluar')
                        ->required()
                        ->afterStateUpdated(function ($state, $set, $get) {
                            if ($get('keluar')) {
                                $set('masuk', null);
                            }
                        }),

                Select::make('status')
                    ->options([
                        'hadir' => 'Hadir',
                        'terlambat' => 'Terlambat',
                    ])
                    ->label('Status Absen')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.username')->label('Nama Pengguna')->sortable()->searchable(),
                TextColumn::make('date')->label('Tanggal')->date()->sortable()->searchable(),
                TextColumn::make('absen_type')->label('Tipe Absen')->sortable()->searchable(),
                TextColumn::make('time_in')->label('Waktu Absen Masuk')->sortable()->searchable()->default('-'),
                TextColumn::make('time_out')->label('Waktu Absen Keluar')->sortable()->searchable()->default('-'),
                TextColumn::make('status')->label('Status Absen')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        if(auth()->user()->hasRole('Admin')) {
            return parent::getEloquentQuery();
        }
        return parent::getEloquentQuery()->whereBelongsTo(auth()->user());
    }
}
