<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'nik' => '1234567890',
                'name' => 'John Doe',
                'position_id' => 1,
                'department_id' => 1,
                'phone' => '081234567890',
                'address' => 'Jl. Raya No. 123',
                'hire_date' => '2021-01-01',
                'status' => 'Permanent',
                'salary' => 10000000,
                'photo' => 'uploads/employees/default.jpg',
            ],
            [
                'nik' => '0987654321',
                'name' => 'Jane Doe',
                'position_id' => 2,
                'department_id' => 2,
                'phone' => '081234567891',
                'address' => 'Jl. Raya No. 124',
                'hire_date' => '2021-01-02',
                'status' => 'Contract',
                'salary' => 8000000,
                'photo' => 'uploads/employees/default.jpg',
            ],
            [
                'nik' => '1231231230',
                'name' => 'Alice',
                'position_id' => 3,
                'department_id' => 3,
                'phone' => '081234567892',
                'address' => 'Jl. Raya No. 125',
                'hire_date' => '2021-01-03',
                'status' => 'Internship',
                'salary' => 5000000,
                'photo' => 'uploads/employees/default.jpg',
            ],
        ];

        foreach ($employees as $employee) {
            \App\Models\Employee::create($employee);
        }
    }
}
