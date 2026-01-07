<?php

namespace App\Http\Requests\Profile\Sim;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreSimRequest extends FormRequest
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
            'sim_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('user_sims')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                }),
            ],
            'sim_type' => ['nullable', Rule::in(['A', 'B1', 'B2', 'C', 'C1', 'C2'])],
            'expired_at' => ['nullable', 'date'],
            'sim_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'sim_number.required' => 'Nomor SIM wajib diisi.',
            'sim_number.unique' => 'Nomor SIM sudah terdaftar.',
            'sim_photo.image' => 'File harus berupa gambar.',
            'sim_photo.mimes' => 'Format foto harus JPG atau PNG.',
        ];
    }
}
