<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model
{
    public $table = 'attendances';

    public $fillable = [
        'employee_id',
        'check_in_time',
        'check_out_time',
        'hours_worked'
    ];

    protected $casts = [
        'check_in_time' => 'datetime',
        'check_out_time' => 'datetime'
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'check_in_time' => 'nullable',
        'check_out_time' => 'nullable',
        'hours_worked' => 'nullable',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id');
    }

    public function getCheckOutTimeAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getCheckInTimeAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
