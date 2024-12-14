<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class EmployeesImport implements ToModel, WithChunkReading
{
    /**
     * Map setiap baris Excel ke model Employee
     */
    public function model(array $row)
    {
        return new Employee([
            'name'       => $row[0],
            'email'      => $row[1],
            'company_id' => $row[2],
        ]);
    }

    /**
     * Tentukan ukuran chunk untuk batch proses data
     */
    public function chunkSize(): int
    {
        return 10; // Proses 10 data per batch
    }
}
