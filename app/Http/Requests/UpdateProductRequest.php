<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $currentYear = date('Y');
        $rules = [
            'name' => 'required',
            'category_id' => 'required|numeric',
            'author_id' => 'required|numeric',
            'isbn' => 'required|numeric',
            'page' => 'required|numeric',
            'year' => "required|numeric|max:$currentYear",
        ];
        return $rules;
    }
}
