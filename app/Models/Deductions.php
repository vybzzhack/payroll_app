<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deductions extends Model
{
    public $table = 'deductions';

    public $fillable = [
        'deduction_name',
        'deduction_type',
        'amount'
    ];

    protected $casts = [
        'deduction_name' => 'string',
        'deduction_type' => 'string'
    ];

    public static array $rules = [
        'deduction_name' => 'nullable|string|max:100',
        'deduction_type' => 'nullable|string|max:50',
        'amount' => 'nullable',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function employeeDeductions()
    {
        return $this->hasMany(EmployeeDeductions::class, 'deduction_id');
    }
}
