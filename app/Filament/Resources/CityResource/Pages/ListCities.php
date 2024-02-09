<?php

namespace App\Filament\Resources\CityResource\Pages;

use App\Filament\Resources\CityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
// use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use App\Filament\Imports\CityImporter;
// use App\Filament\Exports\CityExporter;
class ListCities extends ListRecords
{
    protected static string $resource = CityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->importer(CityImporter::class),
        ];
    }
}
