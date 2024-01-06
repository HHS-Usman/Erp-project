<?php
use League\Csv\Writer;
use League\Csv\CannotInsertRecord;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
class CsvExport implements FromCollection
{
    public function collection()
    {
        // Fetch your data from the database
        $data = Product::all();

        // Create CSV writer
        $csv = Writer::createFromString('');
        $csv->insertOne(['id', 'product_code', 'name']); // Add header

        // Add data to CSV
        foreach ($data as $record) {
            try {
                $csv->insertOne($record->toArray());
            } catch (CannotInsertRecord $e) {
                // Handle error
            }
        }

        return $csv->output('data.csv');
    }
}
