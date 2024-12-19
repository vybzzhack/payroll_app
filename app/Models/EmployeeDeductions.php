<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDeductions extends Model
{
    public $table = 'employee_deductions';

    public $fillable = [
        'employee_id',
        'deduction_id'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'employee_id' => 'required',
        'deduction_id' => 'required',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function deduction()
    {
        return $this->belongsTo(Deductions::class, 'deduction_id');
    }
}
