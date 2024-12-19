<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allowances extends Model
{
    public $table = 'allowances';

    public $fillable = [
        'allowance_type',
        'amount'
    ];

    protected $casts = [
        'allowance_type' => 'string'
    ];

    public static array $rules = [
        'allowance_type' => 'nullable|string|max:100',
        'amount' => 'nullable',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function employeeAllowances()
    {
        return $this->hasMany(EmployeeAllowances::class, 'allowance_id');
    }
}
