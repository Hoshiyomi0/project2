<?php

namespace App\Exports;

use App\Product_Out;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProduckOut implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('product_out.productOutAllExcel',[
            'product_out' => Product_Out::all()
        ]);
    }
}
