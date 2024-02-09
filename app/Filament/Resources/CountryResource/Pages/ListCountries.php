<?php

namespace App\Filament\Resources\CountryResource\Pages;

use App\Filament\Resources\CountryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use App\Filament\Imports\CountryImporter;
use App\Filament\Exports\CountryExporter;
class ListCountries extends ListRecords
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->importer(CountryImporter::class),
            // ExportAction::make()
            //     ->exporter(CountryExporter::class)
        ];
    }
}
