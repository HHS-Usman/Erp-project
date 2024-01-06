<?php
// Excel Export Example
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Product;
use Illuminate\Support\Collection;
class ExcelExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return ['id', 'product_code', 'name']; // Add header
    }

    public function collection()
    {
        // Fetch your data from the database
        return Product::all();
    }
}
