<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Departments;
use App\Models\Allowances;

class Employee extends Model
{
    public $table = 'employees';

    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'department_id',
        'position',
        'hire_date',
        'employment_type',
        'salary',
        'disability_status',
        'job_basis',
        'emergency_contact'
    ];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'address' => 'string',
        'department_id' => 'integer',
        'position' => 'string',
        'hire_date' => 'date',
        'employment_type' => 'string',
        'disability_status' => 'string',
        'job_basis' => 'string'
    ];

    public static array $rules = [
        'first_name' => 'nullable|string|max:100',
        'last_name' => 'nullable|string|max:100',
        'email' => 'nullable|string|max:50',
        'phone_number' => 'nullable',
        'address' => 'nullable|string|max:100',
        'department_id' => 'nullable',
        'position' => 'nullable|string|max:50',
        'hire_date' => 'nullable',
        'employment_type' => 'nullable|string|max:40',
        'salary' => 'nullable',
        'disability_status' => 'nullable|string|max:1',
        'job_basis' => 'nullable|string|max:20',
        'emergency_contact' => 'nullable',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }

    public function allowances()
    {
        return $this->hasMany(Allowances::class, 'employee_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    public function bankDetails()
    {
        return $this->hasMany(Banks::class, 'employee_id');
    }

    public function deductions()
    {
        return $this->hasMany(Deductions::class, 'employee_id');
    }

    public function documentations()
    {
        return $this->hasMany(Documentations::class, 'employee_id');
    }

    public function employeeRecords()
    {
        return $this->hasMany(Employeerecords::class, 'employee_id');
    }

    public function leaves()
    {
        return $this->hasMany(Leaves::class, 'employee_id');
    }

    public function payrolls()
    {
        return $this->hasMany(Payrolls::class, 'employee_id');
    }

    public function promotions()
    {
        return $this->hasMany(Promotions::class, 'employee_id');
    }

    public function salaries()
    {
        return $this->hasMany(Salaries::class, 'employee_id');
    }

    public function getHireDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name );
    }
}
