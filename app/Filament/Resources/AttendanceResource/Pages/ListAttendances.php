<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Filament\Resources\AttendanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\Action;
use App\Filament\Resources\AttendanceResource\Widgets\StatsAttendanceOverview;
class ListAttendances extends ListRecords
{
    protected static string $resource = AttendanceResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\CreateAction::make(),
        ];

        // Mengecek apakah user memiliki role 'Admin'
        if (auth()->user()->hasRole('Admin')) {
            $actions[] = Action::make('exportCsv')
                            ->label('Export CSV')
                            ->url(route('attendance_reports.export'))
                            ->color('success');
        }

        return $actions;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsAttendanceOverview::class,
        ];
    }

}
