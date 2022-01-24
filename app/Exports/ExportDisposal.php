<?php

namespace App\Exports;

use App\Disposal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExportDisposal implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('disposal.DisposalExcel',[
            'disposal' => Disposal::all()
        ]);
    }
}
