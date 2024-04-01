<?php

namespace App\Filament\Widgets;

use App\Models\Attendance;
use App\Models\Overtime;
use App\Models\WorkingHours;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $total_peminjaman = Attendance::count();
        $total_customers = Overtime::Count();
        $total_portfolio = WorkingHours::count();

        $stat = Stat::make('Total Attendance', $total_peminjaman)
        ->descriptionIcon('heroicon-m-document-chart-bar')
        ->description('Jumlah Kehadiran saat ini')
        ->chart([$total_peminjaman])
        ->color('gray');

        $stat2 = Stat::make('Overtime ', $total_customers)
        ->descriptionIcon('heroicon-m-user-group')
        ->description('Jumlah Lembur saat ini')
        ->color('gray');

        $stat3 = Stat::make('WorkingHours ', $total_portfolio)
        ->descriptionIcon('heroicon-m-rocket-launch')
        ->description('Jadwal jam kerja')
        ->color('gray');

        return [$stat, $stat2, $stat3];
    }
}
