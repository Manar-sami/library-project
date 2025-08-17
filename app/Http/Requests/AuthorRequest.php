<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
         'name'        => 'required|string|max:255',
            'code'        => 'required|string|max:50|unique:authors,code',
            'country'     => 'required|string|max:100',
            'books_count' => 'nullable|integer|min:0',
            'email'       => 'required|string|email|max:255|unique:authors,email',
            'password'    => 'required|string|min:6|confirmed',
        ];
    }
}
