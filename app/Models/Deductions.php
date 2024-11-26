<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Deductions extends Model
{
    public $table = 'deductions';

    public $fillable = [
        'employee_id',
        'deduction_type',
        'amount',
        'date_applied'
    ];

    protected $casts = [
        'deduction_type' => 'string',
        'date_applied' => 'date'
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'deduction_type' => 'nullable|string|max:50',
        'amount' => 'nullable',
        'date_applied' => 'nullable',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id');
    }

    public function getDateAppliedAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
