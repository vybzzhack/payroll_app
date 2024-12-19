<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAllowances extends Model
{
    public $table = 'employee_allowances';

    public $fillable = [
        'employee_id',
        'allowance_id'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'allowance_id' => 'nullable',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id');
    }

    public function allowance(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Allowances::class, 'allowance_id');
    }
}
