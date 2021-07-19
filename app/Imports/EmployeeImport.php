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
            'password' => $row[6],
            'created_by_id' => $row[7],
            'updated_by_id' => $row[8],
            'created_at' => date($row[9]),
            'updated_at' => date($row[10]),
        ]);
    }
}
