<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotebookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name' => 'required|max:60|string',
            'company' => 'nullable|max:60|string',
            'phone' => 'required|max:14|string',
            'email' => 'required|max:60|email|string',
            'date_of_birth' => 'nullable|date',
            'photo_path' => 'nullable|string'
        ];
    }
}
