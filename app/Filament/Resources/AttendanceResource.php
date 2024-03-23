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
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

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
                        'time_in' => 'Absen Masuk',
                        'time_out' => 'Absen Keluar',
                    ])
                    ->label('Tipe Absen')
                    ->required()
                    ->reactive(),

                    TimePicker::make('time_in')
                        ->label('Waktu Absen Masuk')
                        ->hidden(fn ($get) => $get('absen_type') !== 'time_in')
                        ->required()->afterStateUpdated(function ($state, $set, $get) {
                            if ($get('time_out')) { // Jika time_out sudah diisi, kosongkan time_in
                                $set('time_in', null);
                            }
                        }),

                    TimePicker::make('time_out')
                        ->label('Waktu Absen Keluar')
                        ->hidden(fn ($get) => $get('absen_type') !== 'time_out')
                        ->required()
                        ->afterStateUpdated(function ($state, $set, $get) {
                            if ($get('time_in')) { // Jika time_in sudah diisi, kosongkan time_out
                                $set('time_out', null);
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
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}
