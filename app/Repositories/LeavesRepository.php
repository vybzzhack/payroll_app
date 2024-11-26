<?php

namespace App\Repositories;

use App\Models\Leaves;
use App\Repositories\BaseRepository;

class LeavesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'leave_type_id',
        'department_id',
        'start_date',
        'end_date',
        'duration',
        'leave_status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Leaves::class;
    }
}
