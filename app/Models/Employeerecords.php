<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employeerecords extends Model
{
    public $table = 'employee_records';

    public $fillable = [
        'employee_id',
        'record_type',
        'record_date',
        'record_description',
        'outcome',
        'comments',
        'handled_by'
    ];

    protected $casts = [
        'record_type' => 'string',
        'record_date' => 'date',
        'record_description' => 'string',
        'outcome' => 'string',
        'comments' => 'string'
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'record_type' => 'nullable|string|max:100',
        'record_date' => 'nullable',
        'record_description' => 'nullable|string|max:200',
        'outcome' => 'nullable|string|max:200',
        'comments' => 'nullable|string|max:200',
        'handled_by' => 'nullable',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function getRecordDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
