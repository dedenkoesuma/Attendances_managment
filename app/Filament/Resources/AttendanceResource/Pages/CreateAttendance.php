<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Filament\Resources\AttendanceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAttendance extends CreateRecord
{
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->id();
    if (isset($data['timeo_out']) != null) {
        $data['time_in'] = null;
    }else{
        $data['time_out'] = null;
    }
    return $data;
}

    protected static string $resource = AttendanceResource::class;
}
