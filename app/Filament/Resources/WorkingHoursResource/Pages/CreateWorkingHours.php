<?php

namespace App\Filament\Resources\WorkingHoursResource\Pages;

use App\Filament\Resources\WorkingHoursResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Pages\Actions\Action;

class CreateWorkingHours extends CreateRecord
{

    protected static string $resource = WorkingHoursResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')->label(__('Back'))->url(WorkingHoursResource::getUrl('index')),
        ];
    }
}
