<?php

namespace App\Repositories;

use App\Models\Promotions;
use App\Repositories\BaseRepository;

class PromotionsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'previous_position',
        'new_position',
        'promotion_date',
        'previous_salary',
        'new_salary',
        'reason',
        'approved_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Promotions::class;
    }
}
