<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClientRequest extends FormRequest
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
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255|unique:clients,contact_email',
            'contact_phone_number' => 'required|numeric|min:11',
            'company_name' => 'required|string|max:255',
            'company_vat' => 'required|numeric|min:9',
            'company_address' => 'required|string|max:255',
            'company_city' => 'required|string|max:255',
            'company_zip' => 'required|numeric|min:4',

        ];
    }
}