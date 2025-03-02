<?php

namespace App\Repositories;

use App\Models\Allowances;
use App\Repositories\BaseRepository;

class AllowancesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'allowance_type',
        'amount'
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
