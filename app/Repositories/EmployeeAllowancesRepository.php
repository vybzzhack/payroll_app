<?php

namespace App\Repositories;

use App\Models\EmployeeAllowances;
use App\Repositories\BaseRepository;

class EmployeeAllowancesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'allowance_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return EmployeeAllowances::class;
    }
}
