<?php

namespace App\Http\Requests;

use App\Rules\Coordinates;
use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
            'ar_name' => ['required', 'max:255'],
            'en_name' => ['required', 'max:255'],
            'ar_address' => ['required', 'max:255'],
            'en_address' => ['required', 'max:255'],
            'phone_numbers' => ['nullable', 'string', 'max:255'],
            'mobile_numbers' => ['nullable', 'string', 'max:255'],
            'location' => ['required', new Coordinates()],
        ];
    }
}
