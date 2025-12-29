<?php

namespace App\Filament\Resources\CrmDepartments\Pages;

use App\Filament\Resources\CrmDepartments\CrmDepartmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCrmDepartments extends ListRecords
{
    protected static string $resource = CrmDepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
