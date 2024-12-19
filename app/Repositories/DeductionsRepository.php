<?php

namespace App\Repositories;

use App\Models\Deductions;
use App\Repositories\BaseRepository;

class DeductionsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'deduction_name',
        'deduction_type',
        'amount'
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
