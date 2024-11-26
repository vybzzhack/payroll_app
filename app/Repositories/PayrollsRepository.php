<?php

namespace App\Repositories;

use App\Models\Payrolls;
use App\Repositories\BaseRepository;

class PayrollsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'salary_id',
        'total_earnings',
        'total_deductions',
        'net_pay',
        'payroll_status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Payrolls::class;
    }
}
