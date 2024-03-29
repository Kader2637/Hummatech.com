<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkflowRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Tidak boleh kosong',
            'description.required' => 'Deskripsi Tidak boleh kosong',
            'description.max' => 'Deskripsi max 255 karaktes'
        ];
    }
}
