<?php

namespace App\Repositories;

use App\Models\Users;
use App\Repositories\BaseRepository;

class UsersRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
        'remember_token'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Users::class;
    }
}
