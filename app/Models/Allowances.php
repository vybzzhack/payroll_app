<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Allowances extends Model
{
    public $table = 'allowances';

    public $fillable = [
        'employee_id',
        'allowance_type',
        'amount',
        'date_granted',
        'allowance_privilage'
    ];

    protected $casts = [
        'allowance_type' => 'string',
        'date_granted' => 'date',
        'allowance_privilage' => 'string'
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'allowance_type' => 'nullable|string|max:50',
        'amount' => 'nullable',
        'date_granted' => 'nullable',
        'allowance_privilage' => 'nullable|string|max:50',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id');
    }

    public function getDateGrantedAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
