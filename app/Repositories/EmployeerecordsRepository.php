<?php

namespace App\Repositories;

use App\Models\Employeerecords;
use App\Repositories\BaseRepository;

class EmployeerecordsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'record_type',
        'record_date',
        'record_description',
        'outcome',
        'comments',
        'handled_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Employeerecords::class;
    }
}
