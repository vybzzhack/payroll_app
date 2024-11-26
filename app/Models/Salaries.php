<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Salaries extends Model
{
    public $table = 'salaries';

    public $fillable = [
        'employee_id',
        'basic_salary',
        'bonus',
        'deductions',
        'net_salary',
        'pay_date'
    ];

    protected $casts = [
        'pay_date' => 'date'
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'basic_salary' => 'nullable',
        'bonus' => 'nullable',
        'deductions' => 'nullable',
        'net_salary' => 'nullable',
        'pay_date' => 'nullable',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function payrolls()
    {
        return $this->hasMany(Payrolls::class, 'salary_id');
    }

    public function getPayDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
