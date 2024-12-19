<?php

namespace App\Repositories;

use App\Models\EmployeeDeductions;
use App\Repositories\BaseRepository;

class EmployeeDeductionsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'deduction_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return EmployeeDeductions::class;
    }
}
