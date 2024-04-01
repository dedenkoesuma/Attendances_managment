<?php

namespace App\Filament\Resources\AttendanceResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Attendance;
class StatsAttendanceOverview extends BaseWidget
{
    protected function getStats(): array
    {
           $totalAttendances = Attendance::count();
           $jamMasuk = Attendance::where('absen_type', 'masuk')->count();

           $stat = Stat::make('Total Attendances', $totalAttendances)
               ->description('Jumlah Attendance')
               ->descriptionIcon('heroicon-m-arrow-trending-up')
               ->chart([7, 2, 10, 3, 15, 4, 17])
               ->color('success');

            $stat1 = Stat::make('Jumlah Absen Masuk', $jamMasuk)
               ->description('Jumlah Absen Masuk')
               ->descriptionIcon('heroicon-m-arrow-trending-up')
               ->chart([7, 2, 10, 3, 15, 4, 17])
               ->color('success');

           return [$stat,$stat1];
    }
}
