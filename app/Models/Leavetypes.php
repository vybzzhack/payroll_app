<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leavetypes extends Model
{
    public $table = 'leave_types';

    public $fillable = [
        'leave_name',
        'duration',
        'paid',
        'leave_condition'
    ];

    protected $casts = [
        'leave_name' => 'string',
        'paid' => 'boolean',
        'leave_condition' => 'string'
    ];

    public static array $rules = [
        'leave_name' => 'nullable|string|max:100',
        'duration' => 'nullable',
        'paid' => 'nullable|boolean',
        'leave_condition' => 'nullable|string|max:100',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function leaves(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Leaf::class, 'leave_type_id');
    }
}
