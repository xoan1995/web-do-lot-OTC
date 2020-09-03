<?php

namespace App\Exports;

use App\Voncher;
use Maatwebsite\Excel\Concerns\FromCollection;

class VoncherExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Voncher::all();
    }
}
