<?php

namespace App\Repositories;

use App\Models\Deductions;
use App\Repositories\BaseRepository;

class DeductionsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'deduction_type',
        'amount',
        'date_applied'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Deductions::class;
    }
}
