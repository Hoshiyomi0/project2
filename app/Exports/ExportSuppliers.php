<?php

namespace App\Exports;

use App\Supplier;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSuppliers implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('suppliers.SuppliersAllExcel',[
            'suppliers' => Supplier::all()
        ]);
    }
}
