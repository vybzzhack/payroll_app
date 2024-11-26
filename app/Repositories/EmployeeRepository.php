<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'department_id',
        'position',
        'hire_date',
        'employment_type',
        'salary',
        'disability_status',
        'job_basis',
        'emergency_contact'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Employee::class;
    }
}
