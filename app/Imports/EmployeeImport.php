<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Employee([
            'first_name' => $row[1],
            'last_name' => $row[2],
            'company' => $row[3],
            'email' => $row[4],
            'phone' => $row[5],
            'created_at' => date($row[6]),
            'updated_at' => date($row[7]),
        ]);
    }
}
