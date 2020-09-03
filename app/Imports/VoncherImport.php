<?php

namespace App\Imports;

use App\Voncher;
use Maatwebsite\Excel\Concerns\ToModel;

class VoncherImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Voncher([
            'value' =>$row[0],
            'voncher' =>$row[1]
        ]);
    }
}
