<?php

namespace App\Filament\Resources\CrmDepartments\Pages;

use App\Filament\Resources\CrmDepartments\CrmDepartmentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCrmDepartment extends ViewRecord
{
    protected static string $resource = CrmDepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
