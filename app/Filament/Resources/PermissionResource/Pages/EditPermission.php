<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use App\Filament\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\Action;
class EditPermission extends EditRecord
{
    protected static string $resource = PermissionResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Action::make('back')->label(__('Back'))->url(PermissionResource::getUrl('index'))
        ];
    }
}
