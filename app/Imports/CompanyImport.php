<?php

namespace App\Imports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;

class CompanyImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Company([
            'name' => $row[1],
            'email' => $row[2],
            'logo' => $row[3],
            'website' => $row[4],
            'created_at' => date($row[5]),
            'updated_at' => date($row[6]),
        ]);
    }
}
