<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'about' => 'required|string',
            'vesion' => 'required|string|max:400',
            'message' => 'required|string',
            'value_professional' => 'required|string|max:400',
            'value_innovation' => 'required|string|max:400',
            'value_quality' => 'required|string|max:400',
            'duty_customer' => 'required|string|max:400',
            'duty_products' => 'required|string|max:400',
            'duty_markets' => 'required|string|max:400',
            'goals_1_title' => 'required|string|max:400',
            'goals_1_body' => 'required|string|max:400',
            'goals_2_title' => 'required|string|max:400',
            'goals_2_body' => 'required|string|max:400',
            'goals_3_title' => 'required|string|max:400',
            'goals_3_body' => 'required|string|max:400',
            'goals_4_title' => 'required|string|max:400',
            'goals_4_body' => 'required|string|max:400',
            'goals_5_title' => 'required|string|max:400',
            'goals_5_body' => 'required|string|max:400',
            'goals_6_title' => 'required|string|max:400',
            'goals_6_body' => 'required|string|max:400',
            'goals_7_title' => 'required|string|max:400',
            'goals_7_body' => 'required|string|max:400',
            'goals_8_title' => 'required|string|max:400',
            'goals_8_body' => 'required|string|max:400',
            'team' => 'required|string|max:400',
            'responsibilities' => 'required|string|max:400',
            'integrity' => 'required|string|max:400',
        ];
    }
}
