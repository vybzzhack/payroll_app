<?php

namespace App\Repositories;

use App\Models\Documentations;
use App\Repositories\BaseRepository;

class DocumentationsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'document_type',
        'document_name',
        'file_path'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Documentations::class;
    }
}
