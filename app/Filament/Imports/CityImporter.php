<?php

namespace App\Filament\Imports;

use App\Models\City;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CityImporter extends Importer
{
    protected static ?string $model = City::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('id')
                ->requiredMapping()
                ->numeric()
                ->rules(['integer'])
                ->ignoreBlankState(),
            ImportColumn::make('state_id')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('city_code')
                ->requiredMapping()
                ->rules(['required', 'max:4']),
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
        ];
    }

    public function resolveRecord(): ?City
    {
        // return City::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'city_code' => $this->data['city_code'],
        //     // 'id' => $this->data['id'],
        // ]);

        // // return new City();

        if ($this->options['updateExisting'] ?? false) {
            return City::firstOrNew([
                'city_code' => $this->data['city_code'],
            ]);
        }
     
        // return new City();
        return City::firstOrNew([
            'id' => $this->data['id'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your city import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
