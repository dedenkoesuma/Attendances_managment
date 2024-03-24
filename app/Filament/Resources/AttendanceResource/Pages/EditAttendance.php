<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Filament\Resources\AttendanceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\Action;
use App\Models\AttendanceReport;

class EditAttendance extends EditRecord
{
    protected static string $resource = AttendanceResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')->label(__('Back'))->url(AttendanceResource::getUrl('index')),
            Actions\DeleteAction::make(),
        ];
    }
}
