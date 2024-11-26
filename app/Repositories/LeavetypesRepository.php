<?php

namespace App\Repositories;

use App\Models\Leavetypes;
use App\Repositories\BaseRepository;

class LeavetypesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'leave_name',
        'duration',
        'paid',
        'leave_condition'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Leavetypes::class;
    }
}
