<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DOBRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dob' => ['required', 'date', 'before:'.now() -> subYears(12)->format('Y-m-d')],
        ];
    }

    /**
     * Pesan jika umur pengguna kurang dari 12 tahun
     */
    public function message(){
        return [
            'dob.before' => 'You must be at least 12 years old. You cannot create account.',
        ];
    }
}
