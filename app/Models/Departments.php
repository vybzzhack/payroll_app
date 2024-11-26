<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    public $table = 'departments';

    public $fillable = [
        'department_name',
        'manager_id'
    ];

    protected $casts = [
        'department_name' => 'string'
    ];

    public static array $rules = [
        'department_name' => 'nullable|string|max:100',
        'manager_id' => 'nullable',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id');
    }


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'department_id');
    }

    public function leaves()
    {
        return $this->hasMany(Leaves::class, 'department_id');
    }
}
