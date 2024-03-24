<?php

namespace App\Filament\Resources\LeaveResource\Pages;

use App\Filament\Resources\LeaveResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Pages\Actions\Action;
use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Validation\ValidationException;

class CreateLeave extends CreateRecord
{
    protected static string $resource = LeaveResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        // Ambil jenis cuti yang dipilih
        $leaveType = LeaveType::findOrFail($data['leave_types_id']);

        // Hitung durasi cuti yang diminta
        $startDate = \Carbon\Carbon::parse($data['start_date']);
        $endDate = \Carbon\Carbon::parse($data['end_date']);
        $leaveDuration = $endDate->diffInDays($startDate);

        if ($leaveDuration > $leaveType->quota) {
            throw ValidationException::withMessages([
                'end_date' => 'Durasi cuti melebihi kuota yang tersedia.',
            ]);
        }
            return $data;

    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')->label(__('Back'))->url(LeaveResource::getUrl('index')),
        ];
    }
}
