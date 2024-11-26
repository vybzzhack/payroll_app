<?php

namespace App\Http\Requests;

use App\Models\Salaries;
use Illuminate\Foundation\Http\FormRequest;

class CreateSalariesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Salaries::$rules;
    }
}
