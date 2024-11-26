<?php

namespace App\Repositories;

use App\Models\Allowances;
use App\Repositories\BaseRepository;

class AllowancesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'allowance_type',
        'amount',
        'date_granted',
        'allowance_privilage'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Allowances::class;
    }
}
