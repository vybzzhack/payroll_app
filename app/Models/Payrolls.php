<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payrolls extends Model
{
    public $table = 'payrolls';

    public $fillable = [
        'employee_id',
        'salary_id',
        'total_earnings',
        'total_deductions',
        'net_pay',
        'payroll_status'
    ];

    protected $casts = [
        'payroll_status' => 'string'
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'salary_id' => 'nullable',
        'total_earnings' => 'nullable',
        'total_deductions' => 'nullable',
        'net_pay' => 'nullable',
        'payroll_status' => 'nullable|string|max:1',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function salary()
    {
        return $this->belongsTo(Salaries::class, 'salary_id');
    }
}
