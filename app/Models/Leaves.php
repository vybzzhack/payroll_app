<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Leaves extends Model
{
    public $table = 'leaves';

    public $fillable = [
        'employee_id',
        'leave_type_id',
        'department_id',
        'start_date',
        'end_date',
        'duration',
        'leave_status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'leave_status' => 'string'
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'leave_type_id' => 'nullable',
        'department_id' => 'nullable',
        'start_date' => 'nullable',
        'end_date' => 'nullable',
        'duration' => 'nullable',
        'leave_status' => 'nullable|string|max:1',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function leaveType()
    {
        return $this->belongsTo(Leavetypes::class, 'leave_type_id');
    }

    public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
