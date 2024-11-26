<?php

namespace App\Repositories;

use App\Models\Attendance;
use App\Repositories\BaseRepository;

class AttendanceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'check_in_time',
        'check_out_time',
        'hours_worked'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Attendance::class;
    }
}
