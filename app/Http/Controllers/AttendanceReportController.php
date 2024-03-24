<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use League\Csv\Writer;

class AttendanceReportController extends Controller
{
    public function exportCsv()
    {
        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        $csv->insertOne(['Nama Pengguna', 'Tanggal', 'Tipe Absen', 'Waktu Masuk', 'Waktu Keluar', 'Status Absen']);

        $reports = Attendance::all();
        foreach ($reports as $report) {
            $csv->insertOne([
                $report->user->username,
                $report->date,
                $report->absen_type,
                $report->time_in,
                $report->time_out,
                $report->status,
            ]);
        }

        return response((string) $csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="attendance_report.csv"',
        ]);
    }
}
