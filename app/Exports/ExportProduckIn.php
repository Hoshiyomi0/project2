<?php

namespace App\Exports;

use App\Product_In;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportProduckIn implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('product_in.productInAllExcel',[
            'product_in' => Product_In::all()
        ]);
    }
}
