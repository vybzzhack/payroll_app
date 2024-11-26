<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentations extends Model
{
    public $table = 'documentations';

    public $fillable = [
        'employee_id',
        'document_type',
        'document_name',
        'file_path'
    ];

    protected $casts = [
        'document_type' => 'string',
        'document_name' => 'string',
        'file_path' => 'string'
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'document_type' => 'nullable|string|max:100',
        'document_name' => 'nullable|string|max:100',
        'file_path' => 'required|file|mimes:pdf,doc,docx|max:2048',
        // 'created_at' => 'required',
        // 'updated_at' => 'required'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
